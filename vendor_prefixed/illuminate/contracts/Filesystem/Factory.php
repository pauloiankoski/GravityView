<?php
/**
 * @license MIT
 *
 * Modified by gravityview on 06-January-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

namespace GravityKit\GravityView\Foundation\ThirdParty\Illuminate\Contracts\Filesystem;

interface Factory
{
    /**
     * Get a filesystem implementation.
     *
     * @param  string  $name
     * @return \GravityKit\GravityView\Foundation\ThirdParty\Illuminate\Contracts\Filesystem\Filesystem
     */
    public function disk($name = null);
}