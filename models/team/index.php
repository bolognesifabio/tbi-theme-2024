<?php
namespace TBI\Models;

class Team {
    public $id;
    public $title;
    public $bio;
    public $url;
    public $club;
    public $emblem;
    public $short_name;
    public $code;
    public $is_inactive;
    public $is_hidden;

    public function __construct($id) { require '__construct.php'; }
    
    private function get_emblem_url() { require '_get-emblem-url.php'; return $emblem_url; }
}