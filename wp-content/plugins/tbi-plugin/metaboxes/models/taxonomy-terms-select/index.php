<?php
namespace TBI\Metaboxes\Models;

class Taxonomy_Terms_Select {
    public function __construct($taxonomy_info) {
        $this->taxonomy_key = $taxonomy_info['key'];
        $this->post_types = is_array($taxonomy_info['post_types']) ? $taxonomy_info['post_types'] : [$taxonomy_info['post_types']];
        $this->metabox_title = $taxonomy_info['title'];
        $this->empty_taxonomy_message = $taxonomy_info['empty_taxonomy_message'] ?: 'Non ci sono termini disponibili.<br/>Creane uno nella sezione apposita.';
        $this->default_option_text = $taxonomy_info['default_option_text'] ?: 'Seleziona un termine';
    }

    public static function add() {
        $forms = [$this, 'forms'];
        include "_add.php";
    }
    
    public static function forms($post) {
        include "_forms.php";
    }

    public static function save($post_id) {
        include "_save.php";
    }
}