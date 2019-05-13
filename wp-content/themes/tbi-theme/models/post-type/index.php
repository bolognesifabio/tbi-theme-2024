<?php
namespace TBI\Models;

class Post_Type {
    private $type_name;
    private $taxonomy_slug_prefix;

    public function __construct($type_name, $options = [], $taxonomy_slug_prefix = false) { require '__construct.php'; }
    public function unregister() { require '_unregister.php'; }
    public function update_taxonomy_term($post_id, $post) { require '_update-taxonomy-term.php'; }
}