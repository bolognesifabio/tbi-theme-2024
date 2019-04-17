<?php
add_meta_box(
    'tbi-metaboxes-competitions-fixtures',
    esc_html__('Calendario'),
    $forms,
    ['leagues', 'cups'],
    'normal',
    'default'
);