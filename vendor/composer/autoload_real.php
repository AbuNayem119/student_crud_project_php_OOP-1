<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitfd673123d2a21997afb94a1e19e79914
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

        spl_autoload_register(array('ComposerAutoloaderInitfd673123d2a21997afb94a1e19e79914', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitfd673123d2a21997afb94a1e19e79914', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitfd673123d2a21997afb94a1e19e79914::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}