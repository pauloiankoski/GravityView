<?php
/**
 * @file class-gravityview-entry-approval-link.php
 * @package   GravityView
 * @license   GPL2+
 * @author    GravityView <hello@gravityview.co>
 * @link      https://gravityview.co
 * @copyright Copyright 2016, Katz Web Services, Inc.
 *
 * @since 2.14.8
 */

/** If this file is called directly, abort. */
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Handle approval links
 *
 * @since 2.14.8
 */
class GravityView_Entry_Approval_Link {

	/**
	 * Default value for the expiration_hours modifier.
	 */
	const EXPIRATION_HOURS = 24;

	/**
	 * Default value for the privacy modifier.
	 */
	const PRIVACY = 'private';

	/**
	 * Initialization.
	 */
	public function __construct() {
		$this->add_hooks();
	}

	/**
	 * Add actions and filters related to entry approval links
	 *
	 * @return void
	 */
	private function add_hooks() {
		add_filter( 'gform_custom_merge_tags', array( $this, '_filter_gform_custom_merge_tags' ), 10, 4 );
		add_filter( 'gform_replace_merge_tags', array( $this, '_filter_gform_replace_merge_tags' ), 10, 7 );
		add_action( 'init', array( $this, '_filter_init' ) );
	}

	/**
	 * Add custom merge tags to merge tag options.
	 *
	 * @since 2.14.8
	 *
	 * @param array $custom_merge_tags
	 * @param int $form_id GF Form ID
	 * @param GF_Field[] $fields Array of fields in the form
	 * @param string $element_id The ID of the input that Merge Tags are being used on
	 *
	 * @return array Modified merge tags
	 */
	public function _filter_gform_custom_merge_tags( $custom_merge_tags = array(), $form_id = 0, $fields = array(), $element_id = '' ) {

		$form = GVCommon::get_form( $form_id );

		$field_merge_tags = $this->custom_merge_tags( $form, $fields );

		return array_merge( $custom_merge_tags, $field_merge_tags );
	}

	/**
	 * Add custom Merge Tags to Merge Tag options, if custom Merge Tags exist
	 *
	 * @since 2.14.8
	 *
	 * @param array $form GF Form array
	 * @param GF_Field[] $fields Array of fields in the form
	 *
	 * @return array Merge tag array with `label` and `tag` keys
	 */
	protected function custom_merge_tags( $form = array(), $fields = array() ) {

		$merge_tags = array(
			array(
				'label' => __( 'Link to approve an entry', 'gravityview' ),
				'tag' => '{gv_approve_entry}',
			),
			array(
				'label' => __( 'Link to disapprove an entry', 'gravityview' ),
				'tag' => '{gv_disapprove_entry}',
			),
			array(
				'label' => __( 'Link to unapprove an entry', 'gravityview' ),
				'tag' => '{gv_unapprove_entry}',
			),
		);

		return $merge_tags;
	}

	/**
	 * Match the merge tag in replacement text for the field.
	 *
	 * @see replace_merge_tag Override replace_merge_tag() to handle any matches
	 *
	 * @since 2.14.8
	 *
	 * @param string $text Text to replace
	 * @param array $form Gravity Forms form array
	 * @param array $entry Entry array
	 * @param bool $url_encode Whether to URL-encode output
	 *
	 * @return string Original text if {_custom_merge_tag} isn't found. Otherwise, replaced text.
	 */
	public function _filter_gform_replace_merge_tags( $text, $form = array(), $entry = array(), $url_encode = false, $esc_html = false  ) {

		$matches = array();
		preg_match_all( '/{gv_(.+)_entry:?([0-9]+)?:?(.+)?}/', $text, $matches, PREG_SET_ORDER );

		// If there are no matches, return original text
		if ( empty( $matches ) ) {
			return $text;
		}

		return $this->replace_merge_tag( $matches, $text, $form, $entry, $url_encode, $esc_html );
	}

	/**
	 * Replace merge tags
	 *
	 * @since 2.14.8
	 *
	 * @param array $matches Array of Merge Tag matches found in text by preg_match_all
	 * @param string $text Text to replace
	 * @param array|bool $form Gravity Forms form array. When called inside {@see GFCommon::replace_variables()} (now deprecated), `false`
	 * @param array|bool $entry Entry array.  When called inside {@see GFCommon::replace_variables()} (now deprecated), `false`
	 * @param bool $url_encode Whether to URL-encode output
	 * @param bool $esc_html Whether to apply `esc_html()` to output
	 *
	 * @return mixed
	 */
	protected function replace_merge_tag( $matches = array(), $text = '', $form = array(), $entry = array(), $url_encode = false, $esc_html = false ) {

		foreach( $matches as $match ) {

			/**
			 * @param string $full_tag         $match[0]
			 * @param string $action           $match[1]
			 * @param int    $expiration_hours $match[2]
			 * @param string $privacy          $match[3]
			 */
			list( $full_tag, $action, $expiration_hours, $privacy ) = $match;

			if ( false === (bool) gravityview()->plugin->settings->get( 'public-approval-link' ) ) {
				$privacy = 'private';
			}

			$token = $this->get_token( $action, $expiration_hours, $privacy, $entry );

			if ( ! $token ) {
				continue;
			}

			$link_url = $this->get_link_url( $token, $privacy );


			if ( self::EXPIRATION_HOURS > (int) $expiration_hours ) {
				$link_url = add_query_arg( array( 'nonce' => wp_create_nonce( 'gv_token' ) ), $link_url );
			}

			$link_labels = array(
				'approve'    => _x( 'Approve', 'Change entry approval status to approved.', 'gravityview' ),
				'disapprove' => _x( 'Disapprove', 'Change entry approval status to disapproved.', 'gravityview' ),
				'unapprove'  => _x( 'Unapprove', 'Change entry approval status to unapproved.', 'gravityview' ),
			);

			$link = sprintf( '<a href="%s">%s</a>', esc_url( $link_url ), esc_html( $link_labels[ $action ] ) );

			$text = str_replace( $full_tag, $link, $text );
		}

		return $text;
	}

	/**
	 * Generate token from merge tag parameters
	 *
	 * @since 2.14.8
	 *
	 * @param string|bool $action Action to be taken by the merge tag.
	 * @param int         $expiration_hours Amount of hours the approval link is valid.
	 * @param string      $privacy Approval link privacy. Accepted values are 'private' or 'public'.
	 * @param array       $entry Entry array.
	 *
	 * @return array Encrypted hash
	 */
	protected function get_token( $action = false, $expiration_hours = 24, $privacy = 'private', $entry = array() ) {

		if ( ! $action || ! $entry['id'] ) {
			return false;
		}

		if ( ! $expiration_hours ) {
			$expiration_hours = self::EXPIRATION_HOURS;
		}

		if ( ! $privacy ) {
			$privacy = self::PRIVACY;
		}

		$approval_status = $this->get_approval_status( $action );

		if ( ! $approval_status ) {
			return false;
		}

		$scopes = array(
			'entry_id'         => $entry['id'],
			'approval_status'  => $approval_status,
			'expiration_hours' => $expiration_hours,
			'privacy'          => $privacy,
		);

		$jti                  = uniqid();
		$expiration_timestamp = strtotime( '+' . (int) $expiration_hours . ' hours' );

		$token_array = array(
			'iat'    => time(),
			'exp'    => $expiration_timestamp,
			'scopes' => $scopes,
			'jti'    => $jti,
		);

		$token = rawurlencode( base64_encode( json_encode( $token_array ) ) );

		$secret = get_option( 'gravityview_token_secret' );
		if ( empty( $secret ) ) {
			$secret = $this->generate_secret();
			update_option( 'gravityview_token_secret', $secret, false );
		}

		$sig = hash_hmac( 'sha256', $token, $secret );

		$token .= '.' . $sig;

		return $token;
	}

	/**
	 *
	 */
	protected function generate_secret( $byte_length = 128 ) {

		if ( function_exists( 'random_bytes' ) ) {
			try {
				return bin2hex( random_bytes( $byte_length ) ); // phpcs:ignore
			} catch ( \Exception $e ) {
			}
		}

		if ( function_exists( 'openssl_random_pseudo_bytes' ) ) {
			$crypto_strong = false;

			$bytes = openssl_random_pseudo_bytes( $byte_length, $crypto_strong );
			if ( true === $crypto_strong ) {
				return bin2hex( $bytes );
			}
		}
	}

	/**
	 * Returns an approval status based on the provided action
	 *
	 * @since 2.14.8
	 *
	 * @param string|bool $action
	 *
	 * @return int Value of respective approval status
	 */
	protected function get_approval_status( $action = false ) {

		if ( ! $action ) {
			return false;
		}

		$key    = GravityView_Entry_Approval_Status::get_key( $action . 'd' );
		$values = GravityView_Entry_Approval_Status::get_values();

		return $values[ $key ];
	}

	/**
	 * Generate approval link URL
	 *
	 * @since 2.14.8
	 *
	 * @param string|bool $token
	 * @param string      $privacy Approval link privacy. Accepted values are 'private' or 'public'.
	 *
	 * @return string Approval link URL
	 */
	protected function get_link_url( $token = false, $privacy = 'private' ) {

		if ( 'public' === $privacy ) {
			$base_url = home_url( '/' );
		} else {
			$base_url = admin_url( '/' );
		}

		$query_args = array();

		if ( ! empty( $token ) ) {
			$query_args['gv_token'] = $token;
		}

		$url = add_query_arg( $query_args, $base_url );

		return $url;
	}

	/**
	 * Check page load for approval link token then maybe process it
	 *
	 * @since 2.14.8
	 *
	 * Expects a $_GET request with the following $_GET keys and values:
	 *
	 * @global array $_GET {
	 * @type string $gv_token Approval link token
	 * @type string $nonce (optional) Nonce hash to be validated. Only available if $expiration_hours is smaller than 24.
	 * }
	 *
	 * @return void
	 */
	public function _filter_init() {

		if ( ! GV\Utils::_GET( 'gv_token' ) && ! GV\Utils::_GET( 'gv_approval_link_result' ) ) {
			return;
		}

		if ( GV\Utils::_GET( 'gv_token' ) ) {
			$token_array = $this->decode_token( GV\Utils::_GET( 'gv_token' ) );

			if ( is_wp_error( $token_array ) ) {
				GVCommon::generate_notice( $token_array->get_error_messages() , 'gv-error' );

				return;
			}

			if ( empty( $token_array ) ) {
				GVCommon::generate_notice( __( 'Invalid request.', 'gravityview' ) , 'gv-error' );

				return;
			}

			$scopes = $token_array['scopes'];

			if ( empty( $scopes['entry_id'] ) || empty( $scopes['approval_status'] ) || empty( $scopes['privacy'] ) ) {
				GVCommon::generate_notice( __( 'Invalid request.', 'gravityview' ) , 'gv-error' );

				return;
			}

			if ( self::PRIVACY === $scopes['privacy'] && ! is_user_logged_in() ) {
				GVCommon::generate_notice( __( 'You are not allowed to perform this operation.', 'gravityview' ) , 'gv-error' );

				return;
			}

			$this->update_approved( $scopes );
		}

		if ( GV\Utils::_GET( 'gv_approval_link_result' ) ) {
			$result = GV\Utils::_GET( 'gv_approval_link_result' );

			if ( 'success' === $result ) {
				GVCommon::generate_notice( __( 'Entry approval updated!', 'gravityview' ), 'gv-success' );
			}

			elseif ( 'error' === $result ) {
				GVCommon::generate_notice( __( 'Error updating approval.', 'gravityview' ), 'gv-error' );
			}
		}
	}

	/**
	 * Decode received token to its original form.
	 *
	 * @since 2.14.8
	 *
	 * @param string|bool $token
	 *
	 * @return array|object Original scopes or WP Error object
	 */
	protected function decode_token( $token = false ) {

		if ( ! $token ) {
			return false;
		}

		if ( ! $this->validate_token( $token ) ) {

			gravityview()->log->error( 'Security check failed.', array( 'data' => $token ) );

			return new WP_Error( 'securiy_check_failed', __( 'Security check failed.', 'gravityview' ) );
		}

		$parts = explode( '.', $token );
		if ( count( $parts ) < 2 ) {
			return false;
		}

		$body_64 = $parts[0];

		$body_json = base64_decode( $body_64 );
		if ( empty( $body_json ) ) {
			return false;
		}

		if ( empty( json_decode( $body_json, true ) ) ) {
			$body_json = base64_decode( urldecode( $body_64 ) );
		}

		return json_decode( $body_json, true );
	}

	/**
	 * Validate token
	 *
	 * @since 2.14.8
	 *
	 * @param string|boold $token
	 *
	 * @return bool Token is valid or not
	 */
	protected function validate_token( $token = false ) {

		if ( ! $token ) {
			return false;
		}

		$parts = explode( '.', $token );
		if ( count( $parts ) < 2 ) {
			return false;
		}

		/**
		 * @param string $body_64 $parts[0]
		 * @param string $sig     $parts[1]
		 */
		list( $body_64, $sig ) = $parts;

		if ( empty( $sig ) ) {
			return false;
		}

		$secret = get_option( 'gravityview_token_secret' );
		if ( empty( $secret ) ) {
			return false;
		}


		$verification_sig  = hash_hmac( 'sha256', $body_64, $secret );
		$verification_sig2 = hash_hmac( 'sha256', rawurlencode( $body_64 ), $secret );

		if ( ! hash_equals( $sig, $verification_sig ) && ! hash_equals( $sig, $verification_sig2 ) ) {
			return false;
		}

		$body_json = base64_decode( $body_64 );
		if ( empty( $body_json ) || empty( json_decode( $body_json, true ) ) ) {
			$body_json = base64_decode( urldecode( $body_64 ) );
			if ( empty( $body_json ) ) {
				return false;
			}
		}

		$token = json_decode( $body_json, true );

		if ( ! isset( $token['jti'] ) ) {
			return false;
		}

		if ( ! isset( $token['exp'] ) || $token['exp'] < time() ) {
			return false;
		}

		if ( ! isset( $token['scopes'] ) ) {
			return false;
		}

		if ( ! isset( $token['scopes']['expiration_hours'] ) ) {
			return false;
		}

		if ( self::EXPIRATION_HOURS > $token['scopes']['expiration_hours'] ) {

			if ( ! isset( $_GET['nonce'] ) ) {
				return false;
			}

			if ( ! wp_verify_nonce( $_GET['nonce'], 'gv_token' ) ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Update approval status
	 *
	 * @since 2.14.8
	 *
	 * @param array $scopes
	 *
	 * @return void Output success or error messages to user on redirect.
	 */
	protected function update_approved( $scopes = array() ) {

		if ( empty( $scopes ) ) {
			return false;
		}

		$entry_id        = $scopes['entry_id'];
		$approval_status = $scopes['approval_status'];

		$entry   = GFAPI::get_entry( $entry_id );
		$form_id = $entry['form_id'];

		// Valid status
		if ( ! GravityView_Entry_Approval_Status::is_valid( $approval_status ) ) {

			gravityview()->log->error( 'Invalid approval status', array( 'data' => $scopes ) );

			$result = new WP_Error( 'invalid_status', __( 'The request was invalid. Refresh the page and try again.', 'gravityview' ) );

		}

		// Valid values
		elseif ( empty( $entry_id ) || empty( $form_id ) ) {

			gravityview()->log->error( 'entry_id or form_id are empty.', array( 'data' => $scopes ) );

			$result = new WP_Error( 'empty_details', __( 'The request was invalid. Refresh the page and try again.', 'gravityview' ) );

		}

		// Has capability
		elseif ( 'private' === $scopes['privacy'] && ! GVCommon::has_cap( 'gravityview_moderate_entries', $entry_id ) ) {

			gravityview()->log->error( 'User does not have the `gravityview_moderate_entries` capability.' );

			$result = new WP_Error( 'Missing Cap: gravityview_moderate_entries', __( 'You do not have permission to edit this entry.', 'gravityview') );

		}

		else {

			$result = GravityView_Entry_Approval::update_approved( $entry_id, $approval_status, $form_id );

		}

		$return_url = admin_url( '/admin.php?page=gf_entries&id=' . $form_id );

		if ( is_wp_error( $result ) ) {

			$return_url = add_query_arg( array( 'gv_approval_link_result' => 'error' ), $return_url );

		} else {

			$return_url = add_query_arg( array( 'gv_approval_link_result' => 'success' ), $return_url );

		}

		wp_safe_redirect( esc_url( $return_url ) );
		exit;
	}
}

new GravityView_Entry_Approval_Link;