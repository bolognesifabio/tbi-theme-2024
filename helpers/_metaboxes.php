<?php
namespace TBI\Helpers;

CONST PARTIAL_METABOXES_VIEWS_PATH = '/views/admin/metaboxes/_partials/';

abstract class Metaboxes {
    public static function render_form($context, $fields, $meta_values) {
        require get_template_directory() . PARTIAL_METABOXES_VIEWS_PATH . 'form.php';
    }

    public static function render_taxonomy_select($options) {
        $taxonomy_terms = get_terms([
            'taxonomy' => $options['key'],
            'hide_empty' => false,
            'orderby' => 'name'
        ]) ?: [];

        $post_terms = array_map(function($term) {
            return $term->term_id;
        }, get_the_terms($post->ID, $options['key']) ?: []);

        require get_template_directory() . PARTIAL_METABOXES_VIEWS_PATH . 'taxonomy-select.php';
    }
}