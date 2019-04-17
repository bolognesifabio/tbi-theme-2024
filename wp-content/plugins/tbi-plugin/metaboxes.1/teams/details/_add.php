<?php
add_meta_box(
    'tbi-metaboxes-teams-details',
    esc_html__('Informazioni della squadra'),
    $forms,
    ['teams'],
    'normal',
    'default'
);