<?php
namespace TBI\Models\Competition;
use TBI\Models\Competition as Competition_Model;

require 'team/index.php';

class League extends Competition_Model {
    // public function get_teams($competition_id) {
    //     $teams = get_post_meta($competition_id, 'tbi-competition-teams', true) ?: [];
    //     $teams = array_map(function($team) {

    //     }, $teams)
    // }
}