<?php
if (in_array(get_post_type($post_id), ['leagues'])) {
    if (isset($_POST['tbi-competitions-turns'])) {
        update_post_meta($post_id, 'tbi-competitions-turns', $_POST['tbi-competitions-turns']);
    }
}