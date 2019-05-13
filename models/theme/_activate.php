<?php
use TBI\Helpers\Files;

Files::require_all_files('post-types');
Files::require_all_files('taxonomies');

flush_rewrite_rules();