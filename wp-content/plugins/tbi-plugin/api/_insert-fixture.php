<?php
namespace TBI\API;
use TBI\Models\API_Route as API_Route;

new API_Route('/competitions/fixtures/insert/(?P<competition_id>\d+)', function($data) {    
    $fixture_id = wp_insert_post([
        'post_type' => 'fixtures',
        'post_status' => 'publish'
    ]);

    return $fixture_id;
});