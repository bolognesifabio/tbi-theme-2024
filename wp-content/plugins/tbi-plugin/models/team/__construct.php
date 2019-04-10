<?php
$team_post = get_post($team_id);
$teams_details = get_post_meta($team_post->ID, 'tbi-teams-details', true) ?: [];

$this->id = $team_post->ID;
$this->title = $team_post->post_title;
$this->bio = $team_post->post_content;
$this->url = get_permalink($this->id);
$this->club = get_the_terms($this->id, 'clubs')[0] ?: null;
$this->emblem = $this->get_emblem_url();
$this->short_name = $teams_details['short-name'] ?: '';
$this->team_code = $teams_details['team-code'] ?: '';
$this->is_inactive = $teams_details['is-inactive'] ? true : false;
