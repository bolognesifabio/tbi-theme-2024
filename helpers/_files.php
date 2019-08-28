<?php
namespace TBI\Helpers;

abstract class Files {
    public static function get_assets_version() {
        return json_decode(file_get_contents(get_template_directory() . "/assets/dist/version.json"));
    }

    public static function require_in_all_directories($index_path) {
        self::require_all_files($index_path);

        foreach(glob(get_template_directory() . "/" . $index_path . '/*', GLOB_ONLYDIR) as $directory_path) {
            foreach(glob($directory_path . "/*.php") as $file_name) require_once($file_name);
        }
    }

    public static function require_all_files($directory_path) {
        foreach(glob(get_template_directory() . "/" . $directory_path . "/*.php") as $file_name) {
            require_once($file_name);
        }
    }

    public static function require_absolute_path($relative_path) {
        require_once(get_template_directory() . '/' . $relative_path);
    }
}