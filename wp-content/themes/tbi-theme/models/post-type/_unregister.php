<?php
unregister_post_type($this->type_name);

if ($this->taxonomy_slug_prefix) unregister_taxonomy($this->taxonomy_slug_prefix);