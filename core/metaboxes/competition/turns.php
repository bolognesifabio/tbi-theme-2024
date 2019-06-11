<?php
use TBI\Models\Core\Metabox;

new Metabox([
    'id' => 'competition-turns',
    'title' => 'Calendario',
    'post_types' => ['leagues', 'cups']
]);