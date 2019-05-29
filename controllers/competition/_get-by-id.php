<?php
use TBI\Models\Competition;

$competition_type = get_post($id)->post_type;

$competition = null;
if ($competition_type === 'cups') $competition = new Cup($id);
if ($competition_type === 'leagues') $competition = new League($id);