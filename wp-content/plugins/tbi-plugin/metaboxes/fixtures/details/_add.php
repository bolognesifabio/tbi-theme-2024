<?php
add_meta_box(
    'tbi-metaboxes-fixtures-details',
    esc_html__('Informazioni della partita'),
    $forms,
    ['fixtures'],
    'normal',
    'default'
);