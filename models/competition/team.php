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
    public $penalty;
    public $priority;
    public $is_not_in_standings;

    public function __construct($id, $competition_info) {
        parent::__construct($id);

        $this->played = 0;
        $this->won = 0;
        $this->loss = 0;
        $this->draw = 0;
        $this->points = 0;
        $this->penalty = $competition_info['penalty'] ?: 0;
        $this->priority = $competition_info['priority'] ?: 0;
        $this->title = $competition_info['name'] ?: "";
        $this->short_name = $competition_info['short_name'] ?: "";
        $this->code = $competition_info['code'] ?: "";
        $this->is_not_in_standings = $competition_info['is_not_in_standings'] ?: false;
    }
}