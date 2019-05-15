<?php
add_meta_box(
    'tbi-metaboxes-' . $this->id,
    esc_html__($this->title),
    [$this, 'render_view'],
    $this->post_types,
    $this->context,
    $this->priority
);