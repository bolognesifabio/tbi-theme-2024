<?php
$emblem_url = "";

$team_post_emblem = get_the_post_thumbnail_url($this->id);
if ($team_post_emblem) $emblem_url = $team_post_emblem;

$club_post_id = intval(str_replace('club-', '', $this->club->slug));
$club_post_emblem = get_the_post_thumbnail_url($club_post_id);
$emblem_url = $club_post_emblem ?: plugins_url('tbi-plugin/img/team-logo.svg');