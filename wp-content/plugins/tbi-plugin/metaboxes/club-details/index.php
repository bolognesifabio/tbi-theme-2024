<?php
namespace TBI\Metaboxes;
use TBI\Models\Metabox as Metabox;

class Club_Details extends Metabox {
    public function render_view($post) { require '_render-view.php'; }
}

new Club_Details([
    'id' => 'club-details',
    'title' => 'Informazioni della società',
    'post_types' => ['clubs']
]);