<?php
namespace TBI\Models;

class API_Route {
    public $route;
    public $callback;
    
    public function __construct($route, $callback) { require '__construct.php'; }
}