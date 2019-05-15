<?php
namespace TBI\Models;

class Theme {
    public function __construct() { require '__construct.php'; }
    public function activate() { require '_activate.php'; }
    public function load_admin_assets() { require '_load-admin-assets.php'; }
}