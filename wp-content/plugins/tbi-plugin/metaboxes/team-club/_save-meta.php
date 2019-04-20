<?php
$is_club_selected = isset($_POST['tbi-metaboxes-clubs']);
$is_post_type_teams = get_post_type($post_id) === 'teams';

if ($is_post_type_teams && $is_club_selected) wp_set_post_terms($post_id, $_POST['tbi-metaboxes-clubs'], 'clubs');