<?php
$taxonomy_terms = get_terms([
    'taxonomy' => self::$taxonomy_key,
    'hide_empty' => false,
    'orderby' => 'name'
]);

$post_terms = array_map(function($term) {
    return $term->term_id;
}, get_the_terms($post->ID, self::$taxonomy_key) ?: []);

if (count($taxonomy_terms)) { ?>
    <select name="tbi-metaboxes-<?= self::$taxonomy_key ?>"> <?php
    foreach ($taxonomy_terms as $term) { ?>
        <option
            value="<?= $term->term_id ?>"
            <?= in_array($term->term_id, $post_terms) ? 'selected' : '' ?>
        ><?= $term->name ?></option> <?php
    } ?>
    </select> <?php
} else { ?>
    <p><?= self::$empty_taxonomy_message ?></p> <?php
} 