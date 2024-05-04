<?php
use TBI\Models\Core\Widgets_Area;

new Widgets_Area([
    'name' => 'Competizioni',
    'id' => 'competitions',
    'class' => 'competitions',
    'before_widget' => '<section class="widget competitions__widget">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget__title">',
    'after_title' => '</h2>'
]);