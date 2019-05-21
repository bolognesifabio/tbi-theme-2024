<?php
function tbi_widgets_areas_sidebar_left() {
    register_sidebar(
        [
            'name' => 'Sidebar sinistra',
            'id' => 'sidebar_left',
            'class' => 'sidebar',
            'before_widget' => '<section class="widget sidebar__widget">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget__title">',
            'after_title' => '</h2>'
        ]
    );
}

add_action( 'widgets_init', 'tbi_widgets_areas_sidebar_left' );
