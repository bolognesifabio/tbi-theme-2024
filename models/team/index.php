<?php
namespace TBI\Models;

class Team {
    public $id;
    public $title;
    public $bio;
    public $url;
    public $club;
    public $emblem;
    public $short_name;
    public $code;
    public $is_inactive;
    public $is_hidden;

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