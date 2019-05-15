<?php
namespace TBI\Models;

class Theme {
    public function __construct() { require '__construct.php'; }
    public function activate() { require '_activate.php'; }
    public function load_admin_assets() { require '_load-admin-assets.php'; }
    // public function do_after_setup() { require '_do-after-setup'; }
    
    
    // public function load_resources() { require '_load-resources.php'; }
}