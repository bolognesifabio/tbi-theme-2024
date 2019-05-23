<?php
$post = get_post($id);

$this->id = $id;
$this->title = $post->post_title;
$this->excerpt = $post->post_excerpt;
$this->content = $post->post_content;
$this->type = $post->post_type; 
$this->competition = wp_get_post_terms($id, 'competitions')[0];
$this->season = wp_get_post_terms($id, 'seasons')[0];

if ($is_full) {
    $this->teams = $this->get_teams($id);
    $this->fixtures = $this->get_fixtures($id);
}