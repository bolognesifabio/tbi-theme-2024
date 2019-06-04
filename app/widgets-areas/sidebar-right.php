<?php
use TBI\Models\Widgets_Area;

new Widgets_Area([
    'name' => 'Sidebar destra',
    'id' => 'sidebar_right',
    'class' => 'sidebar',
    'before_widget' => '<section class="widget sidebar__widget">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget__title">',
    'after_title' => '</h2>'
]);