<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitefbac1bc94d247e5c10c1efc5d3010b5
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitefbac1bc94d247e5c10c1efc5d3010b5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitefbac1bc94d247e5c10c1efc5d3010b5::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}