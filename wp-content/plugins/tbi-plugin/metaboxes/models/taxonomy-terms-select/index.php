<?php
namespace TBI\Metaboxes\Models;

class Taxonomy_Terms_Select {
    private static $taxonomy_key;
    private static $post_types;
    private static $metabox_title;
    private static $empty_taxonomy_message;

    public function init($taxonomy_info) {
        self::$taxonomy_key = $taxonomy_info['key'];
        self::$post_types = is_array($taxonomy_info['post_type']) ? $taxonomy_info['post_type'] : [$taxonomy_info['post_type']];
        self::$metabox_title = $taxonomy_info['title'];
        self::$empty_taxonomy_message = $taxonomy_info['empty_taxonomy_message'] ?: 'Non ci sono termini disponibili.<br/>Creane uno nella sezione apposita.';
    }

    public static function add() {
        $forms = [self::class, 'forms'];
        include "_add.php";
    }
    
    public static function forms($post) {
        include "_forms.php";
    }

    public static function save($post_id) {
        include "_save.php";
    }
}