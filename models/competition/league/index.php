<?php
namespace TBI\Models\Competition;
use TBI\Models\Competition as Competition_Model;

class League extends Competition_Model {
    public $victory_points;    
    public $draw_points;
    public $loss_points;

    public function __construct($id) {
        parent::__construct($id);

        $this->victory_points = $options_meta['victory_points'] ?: 2;
        $this->draw_points = $options_meta['draw_points'] ?: 1;
        $this->loss_points = $options_meta['loss_points'] ?: 0;
    }
}