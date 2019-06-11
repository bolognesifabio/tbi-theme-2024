<?php
use TBI\Models\Core\Metabox;

new Metabox([
    'id' => 'team-details',
    'title' => 'Informazioni della squadra',
    'post_types' => ['teams']
]);