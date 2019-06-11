<?php
use TBI\Models\Core\Theme;
use TBI\Helpers\Files;

require_once(get_template_directory() . '/helpers/index.php');

Files::require_in_all_directories('models');

new Theme();