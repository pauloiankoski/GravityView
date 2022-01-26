<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4b7f82c050f2fbb25a7fec396dad2fd9
{
    public static $files = array (
        '5255c38a0faeba867671b61dfda6d864' => __DIR__ . '/..' . '/paragonie/random_compat/lib/random.php',
        '3109cb1a231dcd04bee1f9f620d46975' => __DIR__ . '/..' . '/paragonie/sodium_compat/autoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TrustedLogin\\' => 13,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'K' => 
        array (
            'Katzgrau\\KLogger\\' => 17,
            'KatzGrau\\KLogger\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TrustedLogin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
            1 => __DIR__ . '/..' . '/trustedlogin/client/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Katzgrau\\KLogger\\' => 
        array (
            0 => __DIR__ . '/..' . '/katzgrau/klogger/src',
        ),
        'KatzGrau\\KLogger\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'ComposerAutoloaderInitb5638313a52df4893eb45c04efdaa356' => __DIR__ . '/..' . '/trustedlogin/client/vendor/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/trustedlogin/client/vendor/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInitb5638313a52df4893eb45c04efdaa356' => __DIR__ . '/..' . '/trustedlogin/client/vendor/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Error' => __DIR__ . '/..' . '/paragonie/random_compat/lib/error_polyfill.php',
        'Katzgrau\\KLogger\\Logger' => __DIR__ . '/..' . '/katzgrau/klogger/src/Logger.php',
        'Katzgrau\\KLogger\\TrustedLogin_Logger' => __DIR__ . '/..' . '/trustedlogin/client/vendor/TrustedLogin/katzgrau/klogger/src/Logger.php',
        'LoggerTest' => __DIR__ . '/..' . '/katzgrau/klogger/tests/LoggerTest.php',
        'ParagonIE\\Sodium\\Compat' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Compat.php',
        'ParagonIE\\Sodium\\Core\\BLAKE2b' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/BLAKE2b.php',
        'ParagonIE\\Sodium\\Core\\ChaCha20' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/ChaCha20.php',
        'ParagonIE\\Sodium\\Core\\ChaCha20\\Ctx' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/ChaCha20/Ctx.php',
        'ParagonIE\\Sodium\\Core\\ChaCha20\\IetfCtx' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/ChaCha20/IetfCtx.php',
        'ParagonIE\\Sodium\\Core\\Curve25519' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/Curve25519.php',
        'ParagonIE\\Sodium\\Core\\Curve25519\\Fe' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/Curve25519/Fe.php',
        'ParagonIE\\Sodium\\Core\\Curve25519\\Ge\\Cached' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/Curve25519/Ge/Cached.php',
        'ParagonIE\\Sodium\\Core\\Curve25519\\Ge\\P1p1' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/Curve25519/Ge/P1p1.php',
        'ParagonIE\\Sodium\\Core\\Curve25519\\Ge\\P2' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/Curve25519/Ge/P2.php',
        'ParagonIE\\Sodium\\Core\\Curve25519\\Ge\\P3' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/Curve25519/Ge/P3.php',
        'ParagonIE\\Sodium\\Core\\Curve25519\\Ge\\Precomp' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/Curve25519/Ge/Precomp.php',
        'ParagonIE\\Sodium\\Core\\Curve25519\\H' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/Curve25519/H.php',
        'ParagonIE\\Sodium\\Core\\Ed25519' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/Ed25519.php',
        'ParagonIE\\Sodium\\Core\\HChaCha20' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/HChaCha20.php',
        'ParagonIE\\Sodium\\Core\\HSalsa20' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/HSalsa20.php',
        'ParagonIE\\Sodium\\Core\\Poly1305' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/Poly1305.php',
        'ParagonIE\\Sodium\\Core\\Poly1305\\State' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/Poly1305/State.php',
        'ParagonIE\\Sodium\\Core\\Salsa20' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/Salsa20.php',
        'ParagonIE\\Sodium\\Core\\SipHash' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/SipHash.php',
        'ParagonIE\\Sodium\\Core\\Util' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/Util.php',
        'ParagonIE\\Sodium\\Core\\X25519' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/X25519.php',
        'ParagonIE\\Sodium\\Core\\XChaCha20' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/XChaCha20.php',
        'ParagonIE\\Sodium\\Core\\Xsalsa20' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Core/Xsalsa20.php',
        'ParagonIE\\Sodium\\Crypto' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/Crypto.php',
        'ParagonIE\\Sodium\\File' => __DIR__ . '/..' . '/paragonie/sodium_compat/namespaced/File.php',
        'ParagonIE_Sodium_Compat' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Compat.php',
        'ParagonIE_Sodium_Core32_BLAKE2b' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/BLAKE2b.php',
        'ParagonIE_Sodium_Core32_ChaCha20' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/ChaCha20.php',
        'ParagonIE_Sodium_Core32_ChaCha20_Ctx' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/ChaCha20/Ctx.php',
        'ParagonIE_Sodium_Core32_ChaCha20_IetfCtx' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/ChaCha20/IetfCtx.php',
        'ParagonIE_Sodium_Core32_Curve25519' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Curve25519.php',
        'ParagonIE_Sodium_Core32_Curve25519_Fe' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Curve25519/Fe.php',
        'ParagonIE_Sodium_Core32_Curve25519_Ge_Cached' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Curve25519/Ge/Cached.php',
        'ParagonIE_Sodium_Core32_Curve25519_Ge_P1p1' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Curve25519/Ge/P1p1.php',
        'ParagonIE_Sodium_Core32_Curve25519_Ge_P2' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Curve25519/Ge/P2.php',
        'ParagonIE_Sodium_Core32_Curve25519_Ge_P3' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Curve25519/Ge/P3.php',
        'ParagonIE_Sodium_Core32_Curve25519_Ge_Precomp' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Curve25519/Ge/Precomp.php',
        'ParagonIE_Sodium_Core32_Curve25519_H' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Curve25519/H.php',
        'ParagonIE_Sodium_Core32_Ed25519' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Ed25519.php',
        'ParagonIE_Sodium_Core32_HChaCha20' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/HChaCha20.php',
        'ParagonIE_Sodium_Core32_HSalsa20' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/HSalsa20.php',
        'ParagonIE_Sodium_Core32_Int32' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Int32.php',
        'ParagonIE_Sodium_Core32_Int64' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Int64.php',
        'ParagonIE_Sodium_Core32_Poly1305' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Poly1305.php',
        'ParagonIE_Sodium_Core32_Poly1305_State' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Poly1305/State.php',
        'ParagonIE_Sodium_Core32_Salsa20' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Salsa20.php',
        'ParagonIE_Sodium_Core32_SecretStream_State' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/SecretStream/State.php',
        'ParagonIE_Sodium_Core32_SipHash' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/SipHash.php',
        'ParagonIE_Sodium_Core32_Util' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/Util.php',
        'ParagonIE_Sodium_Core32_X25519' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/X25519.php',
        'ParagonIE_Sodium_Core32_XChaCha20' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/XChaCha20.php',
        'ParagonIE_Sodium_Core32_XSalsa20' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core32/XSalsa20.php',
        'ParagonIE_Sodium_Core_BLAKE2b' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/BLAKE2b.php',
        'ParagonIE_Sodium_Core_Base64_Common' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Base64/Common.php',
        'ParagonIE_Sodium_Core_Base64_Original' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Base64/Original.php',
        'ParagonIE_Sodium_Core_Base64_UrlSafe' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Base64/UrlSafe.php',
        'ParagonIE_Sodium_Core_ChaCha20' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/ChaCha20.php',
        'ParagonIE_Sodium_Core_ChaCha20_Ctx' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/ChaCha20/Ctx.php',
        'ParagonIE_Sodium_Core_ChaCha20_IetfCtx' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/ChaCha20/IetfCtx.php',
        'ParagonIE_Sodium_Core_Curve25519' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Curve25519.php',
        'ParagonIE_Sodium_Core_Curve25519_Fe' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Curve25519/Fe.php',
        'ParagonIE_Sodium_Core_Curve25519_Ge_Cached' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Curve25519/Ge/Cached.php',
        'ParagonIE_Sodium_Core_Curve25519_Ge_P1p1' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Curve25519/Ge/P1p1.php',
        'ParagonIE_Sodium_Core_Curve25519_Ge_P2' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Curve25519/Ge/P2.php',
        'ParagonIE_Sodium_Core_Curve25519_Ge_P3' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Curve25519/Ge/P3.php',
        'ParagonIE_Sodium_Core_Curve25519_Ge_Precomp' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Curve25519/Ge/Precomp.php',
        'ParagonIE_Sodium_Core_Curve25519_H' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Curve25519/H.php',
        'ParagonIE_Sodium_Core_Ed25519' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Ed25519.php',
        'ParagonIE_Sodium_Core_HChaCha20' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/HChaCha20.php',
        'ParagonIE_Sodium_Core_HSalsa20' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/HSalsa20.php',
        'ParagonIE_Sodium_Core_Poly1305' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Poly1305.php',
        'ParagonIE_Sodium_Core_Poly1305_State' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Poly1305/State.php',
        'ParagonIE_Sodium_Core_Ristretto255' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Ristretto255.php',
        'ParagonIE_Sodium_Core_Salsa20' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Salsa20.php',
        'ParagonIE_Sodium_Core_SecretStream_State' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/SecretStream/State.php',
        'ParagonIE_Sodium_Core_SipHash' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/SipHash.php',
        'ParagonIE_Sodium_Core_Util' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/Util.php',
        'ParagonIE_Sodium_Core_X25519' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/X25519.php',
        'ParagonIE_Sodium_Core_XChaCha20' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/XChaCha20.php',
        'ParagonIE_Sodium_Core_XSalsa20' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Core/XSalsa20.php',
        'ParagonIE_Sodium_Crypto' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Crypto.php',
        'ParagonIE_Sodium_Crypto32' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/Crypto32.php',
        'ParagonIE_Sodium_File' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/File.php',
        'Psr\\Log\\AbstractLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/AbstractLogger.php',
        'Psr\\Log\\InvalidArgumentException' => __DIR__ . '/..' . '/psr/log/Psr/Log/InvalidArgumentException.php',
        'Psr\\Log\\LogLevel' => __DIR__ . '/..' . '/psr/log/Psr/Log/LogLevel.php',
        'Psr\\Log\\LoggerAwareInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareInterface.php',
        'Psr\\Log\\LoggerAwareTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareTrait.php',
        'Psr\\Log\\LoggerInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerInterface.php',
        'Psr\\Log\\LoggerTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerTrait.php',
        'Psr\\Log\\NullLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/NullLogger.php',
        'Psr\\Log\\Test\\DummyTest' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/DummyTest.php',
        'Psr\\Log\\Test\\LoggerInterfaceTest' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/LoggerInterfaceTest.php',
        'Psr\\Log\\Test\\TestLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/TestLogger.php',
        'SodiumException' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/SodiumException.php',
        'SplFixedArray' => __DIR__ . '/..' . '/paragonie/sodium_compat/src/PHP52/SplFixedArray.php',
        'TrustedLoginAJAXTest' => __DIR__ . '/..' . '/trustedlogin/client/tests/test-ajax.php',
        'TrustedLoginConfigTest' => __DIR__ . '/..' . '/trustedlogin/client/tests/test-config.php',
        'TrustedLoginUsersTest' => __DIR__ . '/..' . '/trustedlogin/client/tests/test-users.php',
        'TrustedLogin\\Admin' => __DIR__ . '/..' . '/trustedlogin/client/src/Admin.php',
        'TrustedLogin\\Ajax' => __DIR__ . '/..' . '/trustedlogin/client/src/Ajax.php',
        'TrustedLogin\\Client' => __DIR__ . '/..' . '/trustedlogin/client/src/Client.php',
        'TrustedLogin\\Config' => __DIR__ . '/..' . '/trustedlogin/client/src/Config.php',
        'TrustedLogin\\Cron' => __DIR__ . '/..' . '/trustedlogin/client/src/Cron.php',
        'TrustedLogin\\Encryption' => __DIR__ . '/..' . '/trustedlogin/client/src/Encryption.php',
        'TrustedLogin\\Endpoint' => __DIR__ . '/..' . '/trustedlogin/client/src/Endpoint.php',
        'TrustedLogin\\Envelope' => __DIR__ . '/..' . '/trustedlogin/client/src/Envelope.php',
        'TrustedLogin\\Logging' => __DIR__ . '/..' . '/trustedlogin/client/src/Logging.php',
        'TrustedLogin\\Remote' => __DIR__ . '/..' . '/trustedlogin/client/src/Remote.php',
        'TrustedLogin\\SecurityChecks' => __DIR__ . '/..' . '/trustedlogin/client/src/SecurityChecks.php',
        'TrustedLogin\\SiteAccess' => __DIR__ . '/..' . '/trustedlogin/client/src/SiteAccess.php',
        'TrustedLogin\\SupportRole' => __DIR__ . '/..' . '/trustedlogin/client/src/SupportRole.php',
        'TrustedLogin\\SupportUser' => __DIR__ . '/..' . '/trustedlogin/client/src/SupportUser.php',
        'TrustedLogin\\TrustedLoginClientTest' => __DIR__ . '/..' . '/trustedlogin/client/tests/test-client.php',
        'TrustedLogin\\TrustedLoginEncryptionTest' => __DIR__ . '/..' . '/trustedlogin/client/tests/test-encryption.php',
        'TrustedLogin\\TrustedLoginLoggingTest' => __DIR__ . '/..' . '/trustedlogin/client/tests/test-logging.php',
        'TrustedLogin\\TrustedLoginRemoteTest' => __DIR__ . '/..' . '/trustedlogin/client/tests/test-remote.php',
        'TrustedLogin\\TrustedLoginSiteAccessTest' => __DIR__ . '/..' . '/trustedlogin/client/tests/test-siteaccess.php',
        'TypeError' => __DIR__ . '/..' . '/paragonie/random_compat/lib/error_polyfill.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4b7f82c050f2fbb25a7fec396dad2fd9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4b7f82c050f2fbb25a7fec396dad2fd9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4b7f82c050f2fbb25a7fec396dad2fd9::$classMap;

        }, null, ClassLoader::class);
    }
}
