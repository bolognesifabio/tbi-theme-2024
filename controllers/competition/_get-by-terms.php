<?php
$competitions_ids = get_posts([ 
    'post_type' => ['leagues', 'cups'], 
    'posts_per_page' => -1, 
    'orderby' => 'post_title', 
    'order' => 'DESC', 
    'tax_query' => [ 
        'relation' => 'AND', 
        [ 
            'taxonomy' => 'competitions', 
            'field' => 'term_id', 
            'terms' => $competitions_terms
        ], 
        [ 
            'taxonomy' => 'seasons', 
            'field' => 'term_id', 
            'terms' => $seasons_terms
        ] 
    ],
    'fields' => 'ids'
]);

$competitions = array_map(function($competition_id) {
    return self::get_by_id($competition_id);
}, $competitions_ids}