<?php
namespace TBI\Widgets;

class Standings extends \WP_Widget {
    public function __construct() {
        $widget_ops = [
            'classname' => 'tbi_widget_standings',
            'description' => 'Classifiche',
        ];

        parent::__construct('tbi_widget_standings', 'TBI - Classifiche', $widget_ops);
    }

    public function widget($args, $instance) {
        include "widget/main.php";
    }

    public function form($instance) {
        include "form/main.php";
    }

    public function update($new_instance, $old_instance) {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : 'Classifiche';
        $instance['competitions'] = (!empty($new_instance['competitions'])) ? $new_instance['competitions'] : [];
        $instance['seasons'] = (!empty($new_instance['seasons'])) ? $new_instance['seasons'] : null;
        return $instance;
    }
}

add_action('widgets_init', function() {
    register_widget('\TBI\Widgets\Standings');
});
