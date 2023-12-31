<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit52e51b764560be903ffba81ec135d1a2
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'Yabacon\\' => 8,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Yabacon\\' => 
        array (
            0 => __DIR__ . '/..' . '/yabacon/paystack-php/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit52e51b764560be903ffba81ec135d1a2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit52e51b764560be903ffba81ec135d1a2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit52e51b764560be903ffba81ec135d1a2::$classMap;

        }, null, ClassLoader::class);
    }
}
