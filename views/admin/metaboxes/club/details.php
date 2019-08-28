<?php
use TBI\Helpers\Metaboxes;

$details_meta = get_post_meta($post->ID, $this->meta_name, true) ?: [];
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
    ],
    'is_inactive' => [
        'label' => 'Non pi&ugrave; in attivit&agrave;',
        'type' => 'checkbox'
    ]
];
?>

<div class="<?= $this->bem_base; ?>">
    <section class="<?= $this->bem_base; ?>__contacts"> <?php
        Metaboxes::render_form($this->meta_name, $fields, $details_meta); ?>
    </section>
</div>