<?php
use TBI\Helpers\Metaboxes as Metaboxes_Helper;

$details_meta = get_post_meta($post->ID, 'tbi-teams-details', true) ?: [];
$fields = [
    'short-name' => [
        'label' => 'Nome breve'
    ],
    'code' => [
        'label' => 'Sigla',
        'maxlength' => '3',
        'is_short' => true
    ],
    'is-inactive' => [
        'label' => 'Non pi&ugrave; in attivit&agrave;',
        'type' => 'checkbox'
    ],
    'is-hidden' => [
        'label' => 'Squadra senza pagina',
        'type' => 'checkbox'
    ]
];
?>

<div class="tbi-metaboxes-club">
    <section class="tbi-metaboxes-club__contacts">
        <h3>Dettagli</h3> <?php
        Metaboxes_Helper::render_form('team', $fields, $details_meta); ?>
    </section>
</div>