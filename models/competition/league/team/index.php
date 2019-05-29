<?php
namespace TBI\Models\Competition\League;
use TBI\Models\Team as Team_Model;

require_once(get_template_directory() . '/models/team/index.php');

class Team extends Team_Model {
    // public function get_teams($competition_id) {
    //     $teams = get_post_meta($competition_id, 'tbi-competition-teams', true) ?: [];
    //     $teams = array_map(function($team) {

    //     }, $teams)
    // }
}