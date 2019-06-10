<?php
use TBI\Models\Metabox;

new Metabox([
    'id' => 'competition-teams',
    'title' => 'Squadre partecipanti',
    'post_types' => ['leagues', 'cups']
]);