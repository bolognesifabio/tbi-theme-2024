<?php
namespace TBI\Models;

abstract class Metabox {
    private $options;

    public function __construct($options) { require '__construct.php'; }
    public function init_meta_box() { require '_init-meta-box.php'; }

    abstract public function render_view($post);
    abstract public function save_meta($post_id);
}