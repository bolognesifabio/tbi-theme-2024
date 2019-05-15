<?php
use TBI\Helpers\Files;

Files::require_all_files('post-types');
Files::require_all_files('taxonomies');
Files::require_all_folders('metaboxes');

flush_rewrite_rules();