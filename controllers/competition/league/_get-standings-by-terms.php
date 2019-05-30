<?php
$leagues = parent::get_by_terms($competitions_terms, $seasons_terms);

$standings = array_map(function($league) {
    return self::get_standings($league);
}, $leagues);