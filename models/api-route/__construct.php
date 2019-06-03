<?php
$this->route = $route;
$this->callback = $callback;

add_action('rest_api_init', function() {
    register_rest_route(
        'tbi/v2',
        $this->route,
        [
            'methods' => 'GET',
            'callback' => $this->callback
        ]
    );
});