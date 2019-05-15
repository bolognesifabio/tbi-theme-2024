<?php
use TBI\Helpers\Metaboxes as Metaboxes_Helper;

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
    ]
];
?>

<div class="<?= $this->bem_base; ?>">
    <section class="<?= $this->bem_base; ?>__contacts"> <?php
        Metaboxes_Helper::render_form($this->meta_name, $fields, $details_meta); ?>
    </section>
</div>