<?php
namespace TBI\Models\Core;

class API_Route {
    public $route;
    public $callback;
    
    public function __construct($route, $callback) {
        $this->route = $route;
        $this->callback = $callback;

        add_action('rest_api_init', function() {
            register_rest_route(
                'tbi/v1',
                $this->route,
                [
                    'methods' => 'GET',
                    'callback' => $this->callback
                ]
            );
        });
    }
}