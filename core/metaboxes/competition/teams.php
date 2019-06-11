<?php
use TBI\Models\Core\Metabox;

new Metabox([
    'id' => 'competition-teams',
    'title' => 'Squadre partecipanti',
    'post_types' => ['leagues', 'cups']
]);