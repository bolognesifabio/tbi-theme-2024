<?php
// $competition_term = get_the_terms($competition_id, 'competitions')[0];
// $season_term = get_the_terms($competition_id, 'seasons')[0];
// $fixtures = get_posts([
//     'post_type' => 'fixtures',
//     'posts_per_page' => -1,
//     'orderby' => 'id',
//     'order' => 'DESC',
//     'tax_query' => [
//         'relation' => 'AND',
//         [
//             'taxonomy' => 'competitions',
//             'field' => 'id',
//             'terms' => $competition_term->term_id
//         ],
//         [
//             'taxonomy' => 'seasons',
//             'field' => 'id',
//             'terms' => $season_term->term_id
//         ]
//     ],
//     'fields' => 'ids'
// ]);

$turns = get_post_meta($competition_id, 'tbi-competition-turns', true) ?: [];