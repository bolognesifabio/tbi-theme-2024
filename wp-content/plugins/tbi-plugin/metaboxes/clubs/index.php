<?php
namespace TBI\Metaboxes;
use TBI\Models\Metabox as Metabox;

class Clubs extends Metabox {
    public function render_view($post) { require '_render-view.php'; }
    public function save_meta($post_id) { require '_save-meta.php'; }
}

new Clubs([
    'id' => 'clubs',
    'title' => 'Informazioni della società',
    'post_types' => ['clubs']
]);