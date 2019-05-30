<?php
namespace TBI\Models\Competition;
use TBI\Models\Team as Team_Model;

require_once(get_template_directory() . '/models/team/index.php');

class Team extends Team_Model {
    public $played;
    public $won;
    public $loss;
    public $draw;
    public $points;

    public function __construct($id) {
        parent::__construct($id);

        $this->played = 0;
        $this->won = 0;
        $this->loss = 0;
        $this->draw = 0;
        $this->points = 0;
    }
}