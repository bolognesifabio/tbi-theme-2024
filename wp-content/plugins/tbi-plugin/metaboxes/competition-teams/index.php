<?php
namespace TBI\Metaboxes;
use TBI\Models\Metabox as Metabox;

class Competition_Teams extends Metabox {
    public function render_view($post) { require '_render-view.php'; }
    public function save_meta($post_id) { require '_save-meta.php'; }
}

new Competition_Teams([
    'id' => 'competition-teams',
    'title' => 'Squadre partecipanti',
    'post_types' => ['leagues', 'cups']
]);