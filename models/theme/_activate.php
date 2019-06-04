<?php
use TBI\Helpers\Files;

Files::require_all_files('app/post-types');
Files::require_all_files('app/taxonomies');
Files::require_all_files('app/metaboxes');
Files::require_all_files('app/api');

flush_rewrite_rules();