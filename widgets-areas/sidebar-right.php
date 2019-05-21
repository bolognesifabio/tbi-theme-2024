<?php
function tbi_widgets_areas_sidebar_right() {
    register_sidebar(
        [
            'name' => 'Sidebar destra',
            'id' => 'sidebar_right',
            'class' => 'sidebar',
            'before_widget' => '<section class="widget sidebar__widget">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget__title">',
            'after_title' => '</h2>'
        ]
    );
}

add_action( 'widgets_init', 'tbi_widgets_areas_sidebar_right' );
