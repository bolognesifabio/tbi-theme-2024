<?php
namespace TBI\Models;

class Competition {
    public $id;
    public $title;
    public $type;
    public $competition;
    public $season;
    public $teams;
    public $fixtures;

    public function __construct($id, $is_full = true) { require '__construct.php'; }
    public function get_competition($id) {
        require '_get-competition.php';
        return $competition;
    }
    
    public function get_competitions_by_terms($competitions_terms, $seasons_terms) {
        require '_get-competitions-by-terms.php';
        return $competitions;
    }

    private function get_teams() { require '_get-teams.php'; }
    private function get_fixtures() { require '_get-fixtures.php'; }
}