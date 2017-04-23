<?php
namespace GV;

/** If this file is called directly, abort. */
if ( ! defined( 'GRAVITYVIEW_DIR' ) ) {
	die();
}

/**
 * The View Table Template class .
 *
 * Attached to a \GV\View and used by a \GV\View_Renderer.
 */
class View_Table_Template extends View_Template {
	/**
	 * @var string The template slug to be loaded (like "table", "list")
	 */
	public static $slug = 'table';

	/**
	 * Output the table column names.
	 *
	 * @return void
	 */
	public function the_columns() {
		$fields = $this->view->fields->by_position( 'directory_table-columns' );
		$form = $this->view->form;

		foreach ( $fields->by_visible()->all() as $field ) {
			printf( '<th id="gv-field-%d-%s" class="gv-field-%d-%s"%s><span class="gv-field-label">%s</span></th>',
				esc_attr( $form->ID ), esc_attr( $field->ID ), esc_attr( $form->ID ), esc_attr( $field->ID ),
				$field->width ? sprintf( ' style="width: %d%%"', $field->width ) : '', esc_html( $field->label )
			);
		}
	}

	/**
	 * Output the entry row.
	 *
	 * @param \GV\Entry $entry The entry to be rendered.
	 * @param array $attributes The attributes for the <tr> tag
	 *
	 * @return void
	 */
	public function the_entry( \GV\Entry $entry, $attributes ) {
		/**
		 * @filter `gravityview/entry/row/attributes` Filter the row attributes for the row in table view.
		 *
		 * @param array $attributes The HTML attributes.
		 * @param \GV\Entry $entry The entry this is being called for.
		 * @param \GV\View_Template This template.
		 *
		 * @since future
		 */
		$attributes = apply_filters( 'gravityview/entry/row/attributes', $attributes, $entry, $this );

		/** Glue the attributes together. */
		foreach ( $attributes as $attribute => $value ) {
			$attributes[$attribute] = sprintf( "$attribute=\"%s\"", esc_attr( $value) );
		}
		$attributes = implode( ' ', $attributes );

		$fields = $this->view->fields->by_position( 'directory_table-columns' )->by_visible();

		?>
			<tr<?php echo $attributes ? " $attributes" : ''; ?>>
				<?php foreach ( $fields->all() as $field ) {
					$this->the_field( $entry, $field );
				} ?>
			</tr>
		<?php
	}

	/**
	 * Output a field cell.
	 *
	 * @param \GV\Field $entry The entry this field is for.
	 * @param \GV\Field $field The field to be ouput.
	 *
	 * @return void
	 */
	public function the_field( \GV\Entry $entry, \GV\Field $field ) {
		$attributes = array();

		/**
		 * @filter `gravityview/entry/cell/attributes` Filter the row attributes for the row in table view.
		 *
		 * @param array $attributes The HTML attributes.
		 * @param \GV\Field $field The field these attributes are for.
		 * @param \GV\Entry $entry The entry this is being called for.
		 * @param \GV\View_Template This template.
		 *
		 * @since future
		 */
		$attributes = apply_filters( 'gravityview/entry/cell/attributes', $attributes, $field, $entry, $this );

		/** Glue the attributes together. */
		foreach ( $attributes as $attribute => $value ) {
			$attributes[$attribute] = sprintf( "$attribute=\"%s\"", esc_attr( $value) );
		}
		$attributes = implode( ' ', $attributes );

		printf( '<td%s>%s</td>', $attributes, \gv_value( $entry->as_entry(), $field->as_configuration() ) );
	}
}
