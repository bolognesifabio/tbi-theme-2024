<?php
namespace TBI\Widgets;

class LastPosts extends \WP_Widget {
    public function __construct() {
        include "_construct.php";
    }

    public function widget($args, $instance) {
        include "_widget.php";
    }

    public function form($instance) {
        include "_form.php";
    }

    public function update($new_instance, $old_instance) {
        include "_update.php";
        return $instance;
    }
}

add_action('widgets_init', function() {
    register_widget('\TBI\Widgets\LastPosts');
});
