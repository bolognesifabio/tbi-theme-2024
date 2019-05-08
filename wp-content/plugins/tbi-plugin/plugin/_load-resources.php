<?php
use TBI\Helpers\Files as Files_Helper;

$assets_version_hash = Files_Helper::get_plugin_assets_version()->hash;

wp_enqueue_script('tbi-admin-script', plugin_dir_url(__FILE__) . '../assets/js/index.js?v=' . $assets_version_hash);
wp_enqueue_style('tbi-admin-critical-style', plugin_dir_url(__FILE__) . '../assets/css/style.css?v=' . $assets_version_hash);