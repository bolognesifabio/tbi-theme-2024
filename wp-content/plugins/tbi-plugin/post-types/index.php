<?php
foreach(glob(plugin_dir_path(__FILE__) . '/*', GLOB_ONLYDIR) as $post_type_directory) {
    require_once($post_type_directory . '/index.php');
}