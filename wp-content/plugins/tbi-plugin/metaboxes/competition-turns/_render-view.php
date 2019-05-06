<?php
$turns_meta = get_post_meta($post->ID, $this->meta_name, true) ?: [];
$is_competition_cup = get_post_type($post->ID) === 'cups' ? "true" : "false";
?>

<tbi-competition-turns :is_competition_cup=<?= $is_competition_cup ?> :turns_input='<?= htmlspecialchars(json_encode($turns_meta), ENT_QUOTES) ?>'></tbi-competition-turns>