<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite3182c7216e98c019575c5266b34e22f
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Cowsayphp\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Cowsayphp\\' => 
        array (
            0 => __DIR__ . '/..' . '/alrik11es/cowsayphp/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite3182c7216e98c019575c5266b34e22f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite3182c7216e98c019575c5266b34e22f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
