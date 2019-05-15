<?php
namespace TBI\Metaboxes;
use TBI\Models\Metabox as Metabox;

class Team_Details extends Metabox {
    public function render_view($post) { require '_render-view.php'; }
}

new Team_Details([
    'id' => 'team-details',
    'title' => 'Informazioni della squadra',
    'post_types' => ['teams']
]);