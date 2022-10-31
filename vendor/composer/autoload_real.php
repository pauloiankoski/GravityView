<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit984ed95bef2b0e3d4eeb0208a88dc67d
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit984ed95bef2b0e3d4eeb0208a88dc67d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit984ed95bef2b0e3d4eeb0208a88dc67d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit984ed95bef2b0e3d4eeb0208a88dc67d::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInit984ed95bef2b0e3d4eeb0208a88dc67d::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire984ed95bef2b0e3d4eeb0208a88dc67d($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire984ed95bef2b0e3d4eeb0208a88dc67d($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
