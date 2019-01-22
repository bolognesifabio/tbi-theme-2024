<?php
$meta_teams = get_post_meta($post->ID, 'tbi-competitions-teams', true) ?: [];
$all_teams = get_posts([
    'numberposts' => -1,
    'post_type' => 'teams',
    'post_status' => 'publish',
]); ?>

<div class="competitions-metaboxes__teams">
    <ul class="competitions-metaboxes__teams__participants"> <?php
        foreach ($all_teams as $team) { ?>
            <li class="competitions-metaboxes__teams__participants__item">
                <input
                    class="competitions-metaboxes__teams__participants__item__checkbox"
                    type="checkbox"
                    name="tbi-metaboxes-competitions-teams-participants[<?= $team->ID ?>]"
                    value="<?= $team->ID ?>"
                    <?= in_array($team->ID, $meta_teams) ? 'checked' : '' ?>
                />
                <label class="competitions-metaboxes__teams__participants__item__name"><?= $team->post_title ?></label>    
            </li> <?php
        } ?>
    </ul>
</div>