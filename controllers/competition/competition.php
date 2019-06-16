<?php
namespace TBI\Controllers;
use TBI\Models\Competition\Cup;
use TBI\Models\Competition\League;

abstract class Competition {
    public function get_by_id($id) {
        $competition_type = get_post($id)->post_type;

        if ($competition_type === 'cups') return new Cup($id);
        if ($competition_type === 'leagues') return new League($id);

        return null;
    }

    public function get_by_terms($competitions_terms, $seasons_terms) {
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

        return array_map(function($competition_id) {
            return self::get_by_id($competition_id);
        }, $competitions_ids);
    }
}