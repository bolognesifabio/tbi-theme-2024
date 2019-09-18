<?php
namespace TBI\Controllers;
use TBI\Models\Competition\Cup;
use TBI\Models\Competition\League;

abstract class Competition {
    public function get_competition_by_id($id) {
        $competition_type = get_post($id)->post_type;

        if ($competition_type === 'cups') return new Cup($id);
        if ($competition_type === 'leagues') return new League($id);

        return null;
    }

    public function get_competitions_by_terms($competitions_terms, $seasons_terms, $post_types = ['leagues', 'cups']) {
        return array_map(function($competition_id) {
            return self::get_competition_by_id($competition_id);
        }, self::ids_by_terms($competitions_terms, $seasons_terms, $post_types));
    }

    public function get_ids_by_terms($competitions_terms, $seasons_terms, $post_types = ['leagues', 'cups']) {
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

    public function get_all_seasons($competitions_terms) {
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

    public function get_turns_with_current($turns) {
        $current_turn_index = 0;
        $today_date = strtotime(date('Y-m-d'));        

        foreach ($turns as $index => $turn) {
            $current_turn_date = strtotime($turns[$current_turn_index]["show_date"]);
            $turn_date = strtotime($turn["show_date"]);
            
            if ($today_date >= $turn_date && $turn_date > $current_turn_date) $current_turn_index = $index;
        }

        $turns[$current_turn_index]["is_current"] = true;
        return $turns;
    }

    public function get_turns_fixtures_grouped_by_date($turns) {
        return array_map(function($turn) {
            $output_fixtures = [];

            foreach ($turn["fixtures"] as $fixture) {
                $fixture_date = $fixture["date"] ? strval($fixture["date"]) : "0";
                $output_fixtures[$fixture_date][] = $fixture;
            }
            
            $turn["fixtures"] = $output_fixtures;
            return $turn;
        }, $turns);
    }
}