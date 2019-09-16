<?php
namespace TBI\Controllers;
use TBI\Models\Competition\Cup;
use TBI\Models\Competition\League;

abstract class Competition {
    public function by_id($id) {
        $competition_type = get_post($id)->post_type;

        if ($competition_type === 'cups') return new Cup($id);
        if ($competition_type === 'leagues') return new League($id);

        return null;
    }

    public function ids_by_terms($competitions_terms, $seasons_terms, $post_types = ['leagues', 'cups']) {
        return get_posts([ 
            'post_type' => $post_types,
            'posts_per_page' => -1,
            'orderby' => 'post_title',
            'order' => 'DESC',
            'tax_query' => [
                'relation' => 'AND',
                [
                    'taxonomy' => 'competitions_taxonomy',
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
    }

    public function by_terms($competitions_terms, $seasons_terms, $post_types = ['leagues', 'cups']) {
        return array_map(function($competition_id) {
            return self::by_id($competition_id);
        }, self::ids_by_terms($competitions_terms, $seasons_terms, $post_types));
    }

    public function all_seasons($competitions_terms) {
        $competitions_ids = get_posts([ 
            'post_type' => $post_types,
            'posts_per_page' => -1,
            'orderby' => 'post_title',
            'order' => 'ASC',
            'tax_query' => [
                'relation' => 'AND',
                [
                    'taxonomy' => 'competitions_taxonomy',
                    'field' => 'term_id',
                    'terms' => $competitions_terms
                ]
            ],
            'fields' => 'ids'
        ]);

        $all_seasons = [];

        foreach ($competitions_ids as $competition_id) {
            $season_term = get_the_terms($competition_id, 'seasons')[0];
            $all_seasons[$season_term->slug] = $season_term->name;
        }

        krsort($all_seasons);

        return $all_seasons;
    }
}