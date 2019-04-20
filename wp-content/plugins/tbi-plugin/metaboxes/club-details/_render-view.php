<?php
use TBI\Helpers\Metaboxes as Metaboxes_Helper;

$details_meta = get_post_meta($post->ID, 'tbi-clubs-details', true) ?: [];
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

<div class="tbi-metaboxes-club-details">
    <section class="tbi-metaboxes-club-details__contacts">
        <h3>Dettagli</h3> <?php
        Metaboxes_Helper::render_form('club', $fields, $details_meta); ?>
    </section>
</div>