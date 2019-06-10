<?php
use TBI\Models\Metabox;

new Metabox([
    'id' => 'competition-turns',
    'title' => 'Calendario',
    'post_types' => ['leagues', 'cups']
]);