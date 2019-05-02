<?php
namespace TBI\Models;

abstract class Metabox {
    public $id;
    public $title;
    public $post_types;
    public $bem_base;
    public $meta_name;
    private $priority;
    private $context;

    public function __construct($options) { require '__construct.php'; }
    public function init_meta_box() { require '_init-meta-box.php'; }
    public function save_meta($post_id) { require '_save-meta.php'; }

    abstract public function render_view($post);
}