<?php
use TBI\Controllers\Team;
use TBI\Helpers\Files;

$is_competition_cup = get_post_type($post->ID) === 'cups' ? "true" : "false";
$teams = new Team;
$teams = $teams->get_metaboxes_competition_teams($post->ID, $this->meta_name); ?>

<div class="<?= $this->bem_base ?>"> <?php
    include get_template_directory() . "/views/admin/metaboxes/competition/_partials/teams_filters.php";
    include get_template_directory() . "/views/admin/metaboxes/competition/_partials/teams_list.php";
    include get_template_directory() . "/views/admin/metaboxes/competition/_partials/teams_info.php"; ?>
</div>