<?php
namespace TBI;

abstract class Render {
    public static function switch_checkbox($value = null, $name = null, $is_checked = false) {
        include "_switch-checkbox.php";
    }
}

