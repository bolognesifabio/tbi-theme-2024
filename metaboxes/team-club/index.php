<?php
namespace TBI\Metaboxes;
use TBI\Models\Metabox as Metabox;

class Team_Club extends Metabox {
    public function render_view($post) { require '_render-view.php'; }
}

new Team_Club([
    'id' => 'team-club',
    'title' => 'Societ&agrave;',
    'post_types' => ['teams'],
    'context' => 'side',
    'priority' => 'default'
]);