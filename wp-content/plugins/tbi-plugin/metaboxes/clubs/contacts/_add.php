<?php
add_meta_box(
    'tbi-metaboxes-clubs-contacts',
    esc_html__('Indirizzo e contatti'),
    $forms,
    ['clubs'],
    'normal',
    'default'
);