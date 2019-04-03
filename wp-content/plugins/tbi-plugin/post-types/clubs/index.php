<?php
namespace TBI\Post_Type;

Class Clubs {
    public function __construct() { require '__construct.php'; }
    public function update_club_term($post_id, $post) { require '_update-club-term.php'; }
}

new Clubs();