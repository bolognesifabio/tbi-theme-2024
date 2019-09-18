<?php
namespace TBI\Core\API;
use TBI\Models\Core\API_Route;
use TBI\Controllers\Competition as Competition_Controller;
use TBI\Controllers\Competition\League as League_Controller;

class Competition {
    public function by_id() {
        return Competition_Controller::get_competition_by_id($_GET['id']);
    }
}

new API_Route('/competition', [new Competition, 'by_id']);