<?php
namespace TBI\Metaboxes\Clubs;

class Contacts extends \TBI\Models\Metabox {
    public function render_view($post) { require '_render-view.php'; }
    public function save_meta($post_id) { require '_save-meta.php'; }
}

new Contacts([
    'id' => 'clubs',
    'title' => 'Informazioni della società',
    'post_types' => ['clubs'],
    'context' => 'advanced',
    'priority' => 'high'
]);