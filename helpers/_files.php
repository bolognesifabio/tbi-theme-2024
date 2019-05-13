<?php
namespace TBI\Helpers;

abstract class Files {
    public static $PLUGIN_ROOT_FOLDER = ABSPATH . "wp-content/plugins/tbi-plugin";
    public static $PLUGIN_ASSETS_FOLDER = ABSPATH . "wp-content/plugins/tbi-plugin/assets";

    public static function get_plugin_assets_version() {
        return json_decode(file_get_contents(self::$PLUGIN_ASSETS_FOLDER . "/version.json"));
    }

    public static function require_all_folders($index_path) {
        foreach(glob($index_path . '/*', GLOB_ONLYDIR) as $directory_name) {
            if (glob($directory_name . "/index.php")) require_once($directory_name . '/index.php');
        }
    }

    public static function require_all_files($index_path) {
        foreach(glob(get_template_directory() . "/" . $index_path . "/*.php") as $file_name) {
            require_once($file_name);
        }
    }
}