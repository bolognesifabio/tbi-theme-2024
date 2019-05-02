<?php
namespace TBI\Metaboxes;
use TBI\Models\Metabox as Metabox;

class Competition_Options extends Metabox {
    public function render_view($post) { require '_render-view.php'; }
}

new Competition_Options([
    'id' => 'competition-options',
    'title' => 'Configurazioni',
    'post_types' => ['leagues', 'cups'],
    'context' => 'side',
    'priority' => 'default'
]);