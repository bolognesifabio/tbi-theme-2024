<?php
use TBI\Controllers\Team;
use TBI\Helpers\Files;

$is_competition_cup = get_post_type($post->ID) === 'cups' ? "true" : "false";
$teams = Team::get_metaboxes_competition_teams($post->ID, $this->meta_name); ?>

<div class="<?= $this->bem_base ?>"> <?php
    Files::require_absolute_path("/_partials/teams_filters.php");
    Files::require_absolute_path("/_partials/teams_list.php");
    Files::require_absolute_path("/_partials/teams_info.php"); ?>
</div>