<?php
namespace TBI\Widgets;

class Standings extends \WP_Widget {
    public function __construct() {
        include "_construct.php";
    }

    public function widget($args, $instance) {
        include "widget/main.php";
    }

    public function form($instance) {
        include "form/main.php";
    }

    public function update($new_instance, $old_instance) {
        include "_update.php";
        return $instance;
    }
}

add_action('widgets_init', function() {
    register_widget('\TBI\Widgets\Standings');
});
