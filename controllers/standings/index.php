<?php
namespace TBI\Controllers;

abstract class Standings {
    public function get_by_terms($competitions_terms, $seasons_terms) { require '_get-by-terms.php'; return $standings; }
}