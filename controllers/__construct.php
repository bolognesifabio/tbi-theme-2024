<?php
add_action('rest_api_init', function() {
    register_rest_route(
        'tbi-plugin/v1',
        '/competitions/fixtures/(?P<competition>\d+)/(?P<season>\d+)',
        [
            'methods' => 'GET',
            'callback' => [$this, 'get_fixtures_by_id']
        ]
    );
});

add_action('rest_api_init', function() {
    register_rest_route(
        'tbi-plugin/v1',
        '/competitions/standings/(?P<competition>\d+)/(?P<season>\d+)',
        [
            'methods' => 'GET',
            'callback' => [$this, 'get_standings_by_id']
        ]
    );
});