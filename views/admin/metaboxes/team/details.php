<?php
use TBI\Helpers\Metaboxes as Metaboxes_Helper;

$details_meta = get_post_meta($post->ID, $this->meta_name, true) ?: [];
$fields = [
    'short_name' => [
        'label' => 'Nome breve'
    ],
    'code' => [
        'label' => 'Sigla',
        'maxlength' => '3',
        'is_short' => true
    ],
    'is_inactive' => [
        'label' => 'Non pi&ugrave; in attivit&agrave;',
        'type' => 'checkbox'
    ],
    'is_hidden' => [
        'label' => 'Squadra senza pagina',
        'type' => 'checkbox'
    ]
];
?>

<div class="<?= $this->bem_base; ?>">
    <section class="<?= $this->bem_base; ?>__contacts"> <?php
        Metaboxes_Helper::render_form($this->meta_name, $fields, $details_meta); ?>
    </section>
</div>