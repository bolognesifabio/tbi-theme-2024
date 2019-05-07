<?php
namespace TBI\Helpers;

abstract class Files {
    public static function require_all_folders($index_path) {
        foreach(glob($index_path . '/*', GLOB_ONLYDIR) as $directory_name) {
            require_once($directory_name . '/index.php');
        }
    }

    public static function require_all_files($index_path) {
        foreach(glob($index_path . "/*.php") as $file_name) {
            require_once($file_name);
        }
    }
}