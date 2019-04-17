<?php
namespace TBI\Metaboxes\Teams;

abstract class Details {
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

add_action('add_meta_boxes', ['TBI\Metaboxes\Teams\Details', 'add']);
add_action('save_post', ['TBI\Metaboxes\Teams\Details', 'save']);