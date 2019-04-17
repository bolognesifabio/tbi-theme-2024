<?php
use TBI\Helpers\Metaboxes as Metaboxes_Helper;

$contacts_meta = get_post_meta($post->ID, 'tbi-clubs-contacts', true) ?: [];
$fields = [
    'city' => [
        'label' => 'Citt&agrave;'
    ],
    'province' => [
        'label' => 'Provincia',
        'maxlength' => '2',
        'is_short' => true
    ],
    'address' => [
        'label' => 'Indirizzo'
    ],
    'phone' => [
        'label' => 'Telefono',
        'type' => 'tel'
    ],
    'email' => [
        'label' => 'Email',
        'type' => 'email'
    ],
    'website' => [
        'label' => 'Sito web'
    ]
];
?>

<div class="tbi-metaboxes-club">
    <section class="tbi-metaboxes-club__contacts">
        <h3>Contatti</h3> <?php
        Metaboxes_Helper::render_form('club', $fields, $contacts_meta); ?>
    </section>
</div>