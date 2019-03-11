<?php
$dist_folder_hash = scandir('../wp-content/plugins/tbi-plugin/dist', 1)[0];
wp_enqueue_script('tbi-admin-script', plugin_dir_url(__FILE__) . '../dist/' . $dist_folder_hash . '/main.js', null, null, true);
wp_enqueue_style('tbi-admin-critical-style', plugin_dir_url(__FILE__) . '../dist/' . $dist_folder_hash . '/critical.css');