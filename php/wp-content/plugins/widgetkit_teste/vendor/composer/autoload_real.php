<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit925c972e827e2db1efd7aeaf30c70a67
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('YOOtheme\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit925c972e827e2db1efd7aeaf30c70a67', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \YOOtheme\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInit925c972e827e2db1efd7aeaf30c70a67', 'loadClassLoader'));

        $map = require __DIR__ . '/autoload_namespaces.php';
        foreach ($map as $namespace => $path) {
            $loader->set($namespace, $path);
        }

        $map = require __DIR__ . '/autoload_psr4.php';
        foreach ($map as $namespace => $path) {
            $loader->setPsr4($namespace, $path);
        }

        $classMap = require __DIR__ . '/autoload_classmap.php';
        if ($classMap) {
            $loader->addClassMap($classMap);
        }

        $loader->register(true);

        return $loader;
    }
}

function composerRequire925c972e827e2db1efd7aeaf30c70a67($file)
{
    require $file;
}