<?php
if (in_array(get_post_type($post_id), ['leagues'])) {
    if (isset($_POST['tbi-league-fixtures'])) {
        update_post_meta($post_id, 'tbi-leagues-fixtures', $_POST['tbi-league-fixtures']);
    }
}