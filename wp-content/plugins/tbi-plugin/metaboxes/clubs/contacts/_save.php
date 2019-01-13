<?php
// if(isset($_POST['tbi-teams']) && (get_post_type($post_id) === 'cups' || get_post_type($post_id) === 'leagues')) {
//     $teams = $_POST['tbi-teams'];
//     $alias = $_POST['tbi-alias'] ?: [];
//     $handicaps = $_POST['tbi-handicaps'] ?: [];
//     $output = [];

//     foreach($teams as $team) {
//         $output[$team] = [
//             "alias" => $alias[$team],
//             "handicap" => $handicaps[$team] ?: 0,
//             "id" => $team
//         ];
//     }

//     update_post_meta($post_id, 'tbi-competition-teams', $output);
// }
// echo '<h1>'.$post->post_type.'</h1>';
if (get_post_type($post_id) === 'clubs') {
    $contacts_meta_keys = ['city', 'province', 'address', 'phone', 'email', 'website'];
    $output_contacts = [];
    
    foreach ($contacts_meta_keys as $key) {
        $html_input_name = 'tbi-metaboxes-clubs-contacts-' . $key;
        $output_contacts[$key] = $_POST[$html_input_name] ?: "";
    }
    
    update_post_meta($post_id, 'tbi-clubs-contacts', $output_contacts);
}