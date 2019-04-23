<?php
namespace TBI\Metaboxes;
use TBI\Models\Metabox as Metabox;

class League_Turns extends Metabox {
    public function render_view($post) { require '_render-view.php'; }
    public function save_meta($post_id) { require '_save-meta.php'; }
}

new League_Turns([
    'id' => 'league-turns',
    'title' => 'Calendario',
    'post_types' => ['leagues']
]);