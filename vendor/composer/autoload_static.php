<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6a1bc97a84dd5c057ad1141478043e53
{
    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'widgets\\' => 8,
        ),
        's' => 
        array (
            'shop\\' => 5,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'R' => 
        array (
            'RedBeanPHP\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'widgets\\' => 
        array (
            0 => __DIR__ . '/../..' . '/widgets',
        ),
        'shop\\' => 
        array (
            0 => __DIR__ . '/..' . '/shop/core',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6a1bc97a84dd5c057ad1141478043e53::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6a1bc97a84dd5c057ad1141478043e53::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
