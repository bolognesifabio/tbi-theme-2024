<?php
add_meta_box(
    'tbi-metaboxes-competitions-teams',
    esc_html__('Squadre partecipanti'),
    $forms,
    ['leagues', 'cups'],
    'normal',
    'default'
);