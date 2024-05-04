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
}