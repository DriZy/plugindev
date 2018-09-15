<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf2af9f4cb196371a0a40958180cc87cc
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf2af9f4cb196371a0a40958180cc87cc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf2af9f4cb196371a0a40958180cc87cc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}