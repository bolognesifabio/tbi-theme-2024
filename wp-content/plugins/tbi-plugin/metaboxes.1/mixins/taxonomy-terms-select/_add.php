<?php
add_meta_box(
    'tbi-metaboxes-' . $this->taxonomy_key,
    esc_html__($this->metabox_title),
    $forms,
    $this->post_types,
    'side',
    'default'
);