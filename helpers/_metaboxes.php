<?php
namespace TBI\Helpers;

abstract class Metaboxes {
    public static function render_form($context, $fields, $meta_values) {
        require get_template_directory() . '/views/admin/metaboxes/partials/form.php';
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

        require get_template_directory() . '/views/admin/metaboxes/partials/taxonomy-select.php';
    }
}