<?php
use TBI\Models\Metabox;

new Metabox([
    'id' => 'team-club',
    'title' => 'Societ&agrave;',
    'post_types' => ['teams'],
    'context' => 'side',
    'priority' => 'default'
]);