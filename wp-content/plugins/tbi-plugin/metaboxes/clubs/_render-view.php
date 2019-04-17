<?php
use TBI\Helpers\Metaboxes as Helper;

require 'partials/view-fields.php';
$contacts_meta = get_post_meta($post->ID, 'tbi-clubs-contacts', true) ?: [];
?>

<div class="tbi-metaboxes-club">
    <section class="tbi-metaboxes-club__contacts">
        <h3>Contatti</h3> <?php
        Helper\render_form('club', $fields, $contacts_meta); ?>
    </section>
</div>