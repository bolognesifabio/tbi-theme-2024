<?php
$turns_meta = get_post_meta($post->ID, $this->meta_name, true) ?: [];
?>

<tbi-league-turns :turns_input='<?= htmlspecialchars(json_encode($turns_meta), ENT_QUOTES) ?>'></tbi-league-turns>