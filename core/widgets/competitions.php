<?php
namespace TBI\Widgets;

class Competitions extends \WP_Widget {
    public function __construct() {
        $widget_options = [
            'classname' => 'tbi_widget_competitions',
            'description' => 'Competizioni'
        ];

        parent::__construct('tbi_widget_competitions', 'TBI - Competizioni', $widget_options);
    }
    
    public function form($instance) {
        $title_field = [
            "value" => !empty($instance['title']) ? $instance['title'] : 'Competizioni',
            "id" => esc_attr($this->get_field_id('title')),
            "name" => esc_attr($this->get_field_name('title'))
        ];

        $seasons_field = [
            "value" => !empty($instance['seasons']) ? $instance['seasons'] : null,
            "id" => esc_attr($this->get_field_id('seasons')),
            "name" => esc_attr($this->get_field_name('seasons')),
            "categories" => get_categories(["taxonomy" => "seasons"])
        ];

        $competitions_field = [
            "value" => !empty($instance['competitions']) ? $instance['competitions'] : [],
            "id" => esc_attr($this->get_field_id('competitions')),
            "name" => esc_attr($this->get_field_name('competitions')),
            "categories" => get_terms([
                'taxonomy' => 'competitions_taxonomy',
                'hide_empty' => false,
                'orderby' => 'name'
            ]) ?: []
        ];

        include get_template_directory() . '/views/admin/widgets/competitions.php';
    }

    public function widget($args, $instance) {
        include get_template_directory() . '/views/public/widgets/competitions.php';
    }

    public function update($new_instance, $old_instance) {
        return [
            "title" => !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : 'Classifiche',
            "competitions" => !empty($new_instance['competitions']) ? $new_instance['competitions'] : [],
            "seasons" => !empty($new_instance['seasons']) ? $new_instance['seasons'] : null
        ];
    }
}

add_action('widgets_init', function() {
    register_widget('\TBI\Widgets\Competitions');
});