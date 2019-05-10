<?php
use TBI\Models\Theme;
use TBI\Helpers\Files;

require get_template_directory() . '/helpers/index.php';

Files::require_all_folders(get_template_directory() . '/models');

new Theme();