<?php
// add_action('rest_api_init', function() {
//     register_rest_route(
//         'tbi-plugin/v1',
//         '/competitions/fixtures/(?P<competition>\d+)/(?P<season>\d+)',
//         [
//             'methods' => 'GET',
//             'callback' => [$this, 'get_fixtures_by_id']
//         ]
//     );
// });
use TBI\Controllers\Competition\League;
require_once(get_template_directory() . '/controllers/competition/index.php');
require_once(get_template_directory() . '/controllers/competition/league/index.php');

add_action('rest_api_init', function() {
    register_rest_route(
        'tbi/v1',
        '/competitions/standings/(?P<competition>\d+)/(?P<season>\d+)',
        [
            'methods' => 'GET',
            'callback' => ['League::get_standings_by_terms']
        ]
    );
});