<?php
use TBI\Models\Core\Metabox;

new Metabox([
    'id' => 'competition-options',
    'title' => 'Configurazioni',
    'post_types' => ['leagues', 'cups'],
    'context' => 'side',
    'priority' => 'default'
]);