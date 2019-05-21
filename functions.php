<?php
use TBI\Models\Theme;
use TBI\Helpers\Files;

require get_template_directory() . '/helpers/index.php';

Files::require_all_folders('models');
Files::require_all_folders('views/widgets');
Files::require_all_files('widgets-areas');

new Theme();