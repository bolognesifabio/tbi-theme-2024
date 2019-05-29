<?php
namespace TBI\Controllers;

abstract class Team {
    public function get_all() { require '_get-all.php'; return $teams; }
}