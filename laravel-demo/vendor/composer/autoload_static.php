<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb9e0edb28ff462476caaf2973b3b372f
{
    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'Dflydev\\ApacheMimeTypes' => 
            array (
                0 => __DIR__ . '/..' . '/dflydev/apache-mime-types/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitb9e0edb28ff462476caaf2973b3b372f::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
