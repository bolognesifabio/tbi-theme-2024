<?php
namespace TBI\Controllers;
use TBI\Helpers\Files;

Files::require_all_folders('controllers/competition');

abstract class Competition {
    public function get_by_id($id) { require '_get-by-id.php'; return $competition; }
    public function get_by_terms($competitions_terms, $seasons_terms) { require '_get-by-terms.php'; return $competitions; }
}