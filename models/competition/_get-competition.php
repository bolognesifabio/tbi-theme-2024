<?php
namespace TBI\Models;

require_once(get_template_directory() . '/models/competition/cup/index.php');
require_once(get_template_directory() . '/models/competition/league/index.php');

$competition_type = get_post($id)->post_type;

$competition = null;
if ($competition_type === 'cups') $competition = new Cup($id);
if ($competition_type === 'leagues') $competition = new League($id);