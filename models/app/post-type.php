<?php
namespace TBI\Models;

class Post_Type {
    private $type_name;
    private $taxonomy_slug_prefix;

    public function __construct($type_name, $options = [], $taxonomy_slug_prefix = false) {
        $this->type_name = $type_name;

        $default_options = [
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => false,
            'hierarchical' => false,
            'menu_icon' => get_template_directory_uri() . '/assets/img/svg/' . $type_name . '.svg',
            'supports' => ['title', 'editor', 'thumbnail']
        ];

        register_post_type($type_name, array_merge($default_options, $options));

        if ($taxonomy_slug_prefix) {
            $this->taxonomy_slug_prefix = $taxonomy_slug_prefix;

            add_action('post_updated', [$this, 'update_taxonomy_term'], 10, 2);
        }

        add_action('switch_theme', [$this, 'unregister']);
    }
    
    public function unregister() {
        unregister_post_type($this->type_name);

        if ($this->taxonomy_slug_prefix) unregister_taxonomy($this->taxonomy_slug_prefix);
    }
    
    public function update_taxonomy_term($post_id, $post) {
        $taxonomy_term_slug = $this->taxonomy_slug_prefix . '-' . $post_id;
        $taxonomy_term = get_term_by('slug', $taxonomy_term_slug, $this->type_name);

        if ($this->type_name != get_post_type($post_id) || $post->post_status == 'auto-draft') return;

        if ($post->post_status == 'trash') {
            wp_delete_term($taxonomy_term->term_id, $this->type_name);
            return;
        }

        if ($taxonomy_term) {
            wp_update_term($taxonomy_term->term_id, $this->type_name, [
                'name' => $post->post_title,
                'slug' => $taxonomy_term_slug
            ]);
        } else {
            wp_insert_term(
                $post->post_title, 
                $this->type_name,
                [
                    'slug' => $taxonomy_term_slug
                ]
            );
        }
    }
}