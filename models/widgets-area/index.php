<?php
namespace TBI\Models;

class Widgets_Area {
    public function __construct($options) {
        add_action('widgets_init', function() use ($options) {
            register_sidebar($options);
        });
    }
}