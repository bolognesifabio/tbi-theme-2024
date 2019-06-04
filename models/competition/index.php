<?php
namespace TBI\Models;
use TBI\Helpers\Files as Files_Helper;

Files_Helper::require_all_folders('models/competition');

class Competition {
    public $id;
    public $title;
    public $type;
    public $competition;
    public $season;
    public $date;
    public $are_fixtures_dates_visible;
    public $priority;
    public $teams;
    public $turns;

    public function __construct($id, $is_full = true) { require '__construct.php'; }
    public function get_competition($id) {
        require '_get-competition.php';
        return $competition;
    }
    
    public function get_competitions_by_terms($competitions_terms, $seasons_terms) {
        require '_get-competitions-by-terms.php';
        return $competitions;
    }

    public function get_teams($competition_id) {
        require '_get-teams.php';
        return $teams;
    }

    public function get_turns($competition_id) {
        require '_get-turns.php';
        return $turns;
    }
}