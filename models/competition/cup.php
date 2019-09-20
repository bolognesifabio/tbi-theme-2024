<?php
namespace TBI\Models\Competition;
use TBI\Helpers\Files;
use TBI\Models\Competition as Competition_Model;

Files::require_absolute_path('models/competition.php');

class Cup extends Competition_Model {
    public function __construct($id) {
        parent::__construct($id);
        $this->set_turns_info();
    }
    // public function get_teams($competition_id) {
    //     $teams = get_post_meta($competition_id, 'tbi-competition-teams', true) ?: [];
    //     $teams = array_map(function($team) {

    //     }, $teams)
    // }
}