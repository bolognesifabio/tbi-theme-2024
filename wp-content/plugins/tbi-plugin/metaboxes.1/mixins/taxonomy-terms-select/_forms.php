<?php
$taxonomy_terms = get_terms([
    'taxonomy' => $this->taxonomy_key,
    'hide_empty' => false,
    'orderby' => 'name'
]);

$post_terms = array_map(function($term) {
    return $term->term_id;
}, get_the_terms($post->ID, $this->taxonomy_key) ?: []);

if (count($taxonomy_terms)) { ?>
    <select name="tbi-metaboxes-<?= $this->taxonomy_key ?>">
        <option>- <?= $this->default_option_text ?></option> <?php
    foreach ($taxonomy_terms as $term) { ?>
        <option
            value="<?= $term->term_id ?>"
            <?= in_array($term->term_id, $post_terms) ? 'selected' : '' ?>
        ><?= $term->name ?></option> <?php
    } ?>
    </select> <?php
} else { ?>
    <p><?= $this->empty_taxonomy_message ?></p> <?php
} 