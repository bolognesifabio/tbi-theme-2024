<?php
$this->route = $route;
$this->callback = $callback;

add_action('rest_api_init', function() {
    register_rest_route(
        'tbi-plugin/v1',
        $this->route,
        [
            'methods' => 'GET',
            'callback' => $this->callback
        ]
    );
});