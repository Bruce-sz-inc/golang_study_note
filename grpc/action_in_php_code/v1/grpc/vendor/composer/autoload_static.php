<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite678627a5661234a387cd993a4a44048
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Grpc\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Grpc\\' => 
        array (
            0 => __DIR__ . '/..' . '/grpc/grpc/src/lib',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/Redis',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite678627a5661234a387cd993a4a44048::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite678627a5661234a387cd993a4a44048::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInite678627a5661234a387cd993a4a44048::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}
