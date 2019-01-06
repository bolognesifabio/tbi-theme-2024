<?php
namespace TBI\Post_Type;

Class Teams {
    public function __construct() { require '__construct.php'; }
    public function register_post_type() { require '_register-post-type.php'; }
}

new Teams();