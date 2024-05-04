<?php
use TBI\Models\Core\Metabox;

new Metabox([
    'id' => 'club-details',
    'title' => 'Informazioni della società',
    'post_types' => ['clubs']
]);