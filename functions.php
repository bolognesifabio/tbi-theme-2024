<?php
use TBI\Models\Theme;
use TBI\Helpers\Files;

require get_template_directory() . '/helpers/index.php';

Files::require_all_folders('models');

new Theme();