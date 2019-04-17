<?php
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
            'tbi-metaboxes-' . $this->options['id'],
            esc_html__($this->options['title']),
            [$this, 'render_view'],
            $this->options['post_types'],
            $this->options['context'] ?: 'normal',
            $this->options['priority'] ?: 'default'
        );
    }

    abstract public function render_view($post);
    abstract public function save_meta($post_id);
}