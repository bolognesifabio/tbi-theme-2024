<?php
add_meta_box(
    'tbi-metaboxes-' . self::$post_types,
    esc_html__(self::$metabox_title),
    $forms,
    self::$post_types,
    'side',
    'default'
);