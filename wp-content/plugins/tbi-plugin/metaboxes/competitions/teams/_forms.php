<?php
$meta_teams = get_post_meta($post->ID, 'tbi-competitions-teams', true) ?: [];
$all_teams = get_posts([
    'numberposts' => -1,
    'post_type' => 'teams',
    'post_status' => 'publish',
    'orderby' => 'title',
	'order' => 'ASC'
]); ?>

<div class="competitions-metaboxes__teams">
    <div class="competitions-metaboxes__teams__hide-inactive">
        <label class="competitions-metaboxes__teams__hide-inactive__label">Nascondi team non più in attivit&agrave;</label>
        <?php TBI\Render::switch_checkbox(); ?>
    </div>
    <hr/>
    <ul class="competitions-metaboxes__teams__participants"> <?php
        foreach ($all_teams as $team_post) {
            $team = new TBI\Models\Team($team_post); ?>

            <li class="competitions-metaboxes__teams__participants__item">
                <input
                    class="competitions-metaboxes__teams__participants__item__checkbox"
                    type="checkbox"
                    name="tbi-metaboxes-competitions-teams-participants[<?= $team->id ?>]"
                    value="<?= $team->id ?>"
                    <?= in_array($team->id, $meta_teams) ? 'checked' : '' ?>
                />
                <div class="competitions-metaboxes__teams__participants__item__emblem">
                    <img class="competitions-metaboxes__teams__participants__item__emblem__image" src="<?= $team->emblem ?>" />
                </div>
                <label class="competitions-metaboxes__teams__participants__item__name"><?= $team->title ?></label>
            </li> <?php
        } ?>
    </ul>
</div>