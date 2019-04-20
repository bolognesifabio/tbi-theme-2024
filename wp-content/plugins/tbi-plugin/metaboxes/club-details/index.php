<?php
namespace TBI\Metaboxes;
use TBI\Models\Metabox as Metabox;

class Club_Details extends Metabox {
    public function render_view($post) { require '_render-view.php'; }
    public function save_meta($post_id) { require '_save-meta.php'; }
}

new Club_Details([
    'id' => 'club-details',
    'title' => 'Informazioni della società',
    'post_types' => ['clubs']
]);