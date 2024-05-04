<?php
use TBI\Models\Core\Metabox;

new Metabox([
    'id' => 'team-club',
    'title' => 'Societ&agrave;',
    'post_types' => ['teams'],
    'context' => 'side',
    'priority' => 'default'
]);