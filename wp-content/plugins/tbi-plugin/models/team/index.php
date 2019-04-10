<?php
namespace TBI\Models;

class Team {
    public function __construct($team_id) { require '__construct.php'; }

    public static function get_all_teams() {
        require '_get-all-teams.php';
        return $teams;
    }

    private function get_emblem_url() {
        require '_get-emblem-url.php';
        return $emblem_url;
    }
}