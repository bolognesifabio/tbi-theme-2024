<?php
// namespace TBI\Metaboxes\Clubs;

// abstract class Contacts {
//     public static function add() {
//         $forms = [self::class, 'forms'];
//         include "_add.php";
//     }
    
//     public static function forms($post) {
//         include "_forms.php";
//     }

//     public static function save($post_id) {
//         include "_save.php";
//     }
// }

// add_action('add_meta_boxes', ['TBI\Metaboxes\Clubs\Contacts', 'add']);
// add_action('save_post', ['TBI\Metaboxes\Clubs\Contacts', 'save']);

namespace TBI\Models;

abstract class Metabox {
    private $options;

    public function __construct($options) {
        $this->options = $options;

        add_action('add_meta_boxes', [$this, 'init_meta_box']);
        add_action('save_post', [$this, 'save_meta']);
    }

    public function init_meta_box() {
        add_meta_box(
            $this->options['id'],
            esc_html__($this->options['title']),
            [$this, 'render_view'],
            $this->options['post_types'],
            $this->options['context'] ?: 'normal',
            $this->options['priority'] ?: 'default'
        );
    }

    abstract public function render_view();
    abstract public function save_meta();
}

class ClubsCon extends Metabox {
    public function render_view() {
        echo '<h1>CLUBS</h1>';
    }

    public function save_meta() {
        
    }
}

new ClubsCon([
    'id' => 'tbi-metaboxes-clubs-contacts',
    'title' => 'Indirizzo e contatti',
    'post_types' => ['clubs']
]);