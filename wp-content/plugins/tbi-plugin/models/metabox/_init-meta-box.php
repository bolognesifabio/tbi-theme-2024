<?php
add_meta_box(
    'tbi-metaboxes-' . $this->options['id'],
    esc_html__($this->options['title']),
    [$this, 'render_view'],
    $this->options['post_types'],
    $this->options['context'] ?: 'normal',
    $this->options['priority'] ?: 'default'
);