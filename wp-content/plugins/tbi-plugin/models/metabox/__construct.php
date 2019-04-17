<?php
$this->options = $options;

add_action('add_meta_boxes', [$this, 'init_meta_box']);
add_action('save_post', [$this, 'save_meta']);