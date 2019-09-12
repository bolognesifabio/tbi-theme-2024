<?php
use TBI\Models\Core\Widgets_Area;

new Widgets_Area([
    'name' => 'Home - Sidebar',
    'id' => 'home_sidebar',
    'class' => 'home__sidebar',
    'before_widget' => '<section class="widget home__sidebar__widget">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget__title">',
    'after_title' => '</h2>'
]);