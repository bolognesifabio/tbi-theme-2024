<?php
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