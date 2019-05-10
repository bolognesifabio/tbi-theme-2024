<?php
namespace TBI\Models;

class Plugin {
    public function __construct() { require '__construct.php'; }
    public function activate() { require '_activate.php'; }
    public function deactivate() { require '_deactivate.php'; }
    public function add_post_types() { require '_add-post-types.php'; }
    public function add_taxonomies() { require '_add-taxonomies.php'; }
    public function load_resources() { require '_load-resources.php'; }
}