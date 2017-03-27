<?php

// autoload_static.php @generated by Composer

namespace YOOtheme\Autoload;

class ComposerStaticInit01ba895338f8da7eb59a1bdeeee8a6e5
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'YOOtheme\\Widgetkit\\' => 19,
            'YOOtheme\\Framework\\' => 19,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'YOOtheme\\Widgetkit\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'YOOtheme\\Framework\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/framework/src',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $prefixesPsr0 = array (
        'a' => 
        array (
            'abeautifulsite' => 
            array (
                0 => __DIR__ . '/..' . '/abeautifulsite/simpleimage/src',
            ),
        ),
    );

    public static $classMap = array (
        'Codebird\\Codebird' => __DIR__ . '/..' . '/jublonet/codebird-php/src/codebird.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit01ba895338f8da7eb59a1bdeeee8a6e5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit01ba895338f8da7eb59a1bdeeee8a6e5::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit01ba895338f8da7eb59a1bdeeee8a6e5::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit01ba895338f8da7eb59a1bdeeee8a6e5::$classMap;

        }, null, ClassLoader::class);
    }
}
