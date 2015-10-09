<?php

class ThemeAutoload
{
    public static $libraryFolder = 'lib';

    /**
     * Register loader with SPL autoloader stack.
     *
     * @return void
     */
    public static function register()
    {
        spl_autoload_register('ThemeAutoload::loadClass');
    }

    /**
     * Loads the class file for a given class name.
     *
     * @param string $class The fully-qualified class name.
     * @return bool True on success, or false on failure.
     */
    public static function loadClass($class)
    {
        $libraryFolder = DIRECTORY_SEPARATOR . trim(Self::$libraryFolder, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $libraryRoot = __DIR__ . $libraryFolder;
        $classFileName = str_replace(array('\\', '_'), DIRECTORY_SEPARATOR, $class) . '.php';
        $fileName = realpath($libraryRoot . $classFileName);
        return Self::requireFile($fileName);
    }

    /**
     * If a file exists, require it from the file system.
     *
     * @param string $file The file to require.
     * @return bool True if the file exists, false if not.
     */
    protected static function requireFile($file)
    {
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
        return false;
    }
}

ThemeAutoload::register();