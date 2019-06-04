<?php
use TBI\Models\Competition\League;

$leagues = self::get_standings(parent::get_by_id($league_id));