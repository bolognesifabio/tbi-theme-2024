<?php
function tbi_widgets_areas_home_main() {
    register_sidebar(
        [
            'name' => 'Home - Colonna centrale',
            'id' => 'home_main',
            'class' => 'home__main',
            'before_widget' => '<section class="widget home__main__widget">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget__title">',
            'after_title' => '</h2>'
        ]
    );
}

add_action( 'widgets_init', 'tbi_widgets_areas_home_main' );
?>
