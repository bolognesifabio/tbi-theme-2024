<?php
namespace TBI;

Class API {
    public function __construct() { require '__construct.php'; }
    public function get_fixtures_by_id($data) { require '_get-fixtures-by-id.php'; return $leagues; }
    public function get_standings_by_id($data) { require '_get-standings-by-id.php'; return $league; }
}

new API();