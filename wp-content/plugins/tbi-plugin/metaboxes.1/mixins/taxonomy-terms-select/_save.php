<?php
$select_name = 'tbi-metaboxes-' . $this->taxonomy_key;

if (isset($_POST[$select_name])) {
    wp_set_post_terms($post_id, $_POST[$select_name], $this->taxonomy_key);
}

// if (get_post_type($post_id) === 'clubs') {
//     $contacts_meta_keys = ['city', 'province', 'address', 'phone', 'email', 'website'];
//     $output_contacts = [];
    
//     foreach ($contacts_meta_keys as $key) {
//         $html_input_name = 'tbi-metaboxes-clubs-contacts-' . $key;
//         $output_contacts[$key] = $_POST[$html_input_name] ?: "";
//     }
    
//     update_post_meta($post_id, 'tbi-clubs-contacts', $output_contacts);
// }