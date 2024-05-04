<?php
use TBI\Models\Core\Widgets_Area;

new Widgets_Area([
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'class' => 'sidebar',
    'before_widget' => '<section class="widget sidebar__widget">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget__title">',
    'after_title' => '</h2>'
]);