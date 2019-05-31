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

    public function __construct($id, $competition_info) { require '__construct.php'; }
}