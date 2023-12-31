<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7658c384a4e4fd19ef5bca51047d1d36
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'B' => 
        array (
            'Buttoudin\\District\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Buttoudin\\District\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7658c384a4e4fd19ef5bca51047d1d36::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7658c384a4e4fd19ef5bca51047d1d36::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7658c384a4e4fd19ef5bca51047d1d36::$classMap;

        }, null, ClassLoader::class);
    }
}
