<?php
$this->register_post_type();
add_action('post_updated', [$this, 'update_competition_term'], 10, 2);