<?php
namespace TBI\Models;

class Metabox {
    public $id;
    public $title;
    public $post_types;
    public $bem_base;
    public $meta_name;
    
    private $priority;
    private $context;

    public function __construct($options) {
        $this->id = $options['id'];
        $this->title = $options['title'];
        $this->post_types = $options['post_types'];
        $this->context = $options['context'] ?: 'normal';
        $this->priority = $options['priority'] ?: 'default';
        $this->bem_base = 'tbi-metaboxes-' . $this->id;
        $this->meta_name = 'tbi-' . $this->id;

        add_action('add_meta_boxes', [$this, 'init_meta_box']);
        add_action('save_post', [$this, 'save_meta']);
    }

    public function init_meta_box() {
        add_meta_box(
            'tbi-metaboxes-' . $this->id,
            esc_html__($this->title),
            [$this, 'render_view'],
            $this->post_types,
            $this->context,
            $this->priority
        );
    }

    public function save_meta($post_id) {
        $is_doing_autosave = defined('DOING_AUTOSAVE') && DOING_AUTOSAVE;
        $is_post_type_valid = in_array(get_post_type($post_id), $this->post_types);

        $post_meta = isset($_POST[$this->meta_name]) ? $_POST[$this->meta_name] : null;
        $post_terms = isset($_POST[$this->meta_name . '-term']) ? $_POST[$this->meta_name . '-term'] : null;

        if ($is_doing_autosave) return $post_id;

        if ($is_post_type_valid && $post_meta) update_post_meta($post_id, $this->meta_name, $_POST[$this->meta_name]);

        if ($is_post_type_valid && $post_terms) {
            foreach ($post_terms as $taxonomy => $term) wp_set_post_terms($post_id, $term, $taxonomy);
        }
    }
    
    public function render_view() {
        require_once(get_template_directory() . '/views/admin/metaboxes/' . $this->id . '.php');
    }
}