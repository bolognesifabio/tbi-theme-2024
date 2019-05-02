<?php
$this->id = $options['id'];
$this->title = $options['title'];
$this->post_types = $options['post_types'];
$this->context = $options['context'] ?: 'normal';
$this->priority = $options['priority'] ?: 'default';
$this->bem_base = 'tbi-metaboxes-' . $this->id;
$this->meta_name = 'tbi-' . $this->id;

add_action('add_meta_boxes', [$this, 'init_meta_box']);
add_action('save_post', [$this, 'save_meta']);