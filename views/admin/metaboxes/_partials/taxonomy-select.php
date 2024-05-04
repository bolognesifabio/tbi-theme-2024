<?php
if (count($taxonomy_terms)) { ?>
    <select class="tbi-metaboxes-term-select" name="<?= $options['name'] ?>-term[<?= $options['key'] ?>]">
        <option>- <?= $options['default_option_text'] ?></option> <?php
        
        foreach ($taxonomy_terms as $term) { ?>
            <option
                value="<?= $term->term_id ?>"
                <?= in_array($term->term_id, $post_terms) ? 'selected' : '' ?>
            ><?= $term->name ?></option> <?php
        } ?>
    </select> <?php
} else { ?>
    <p><?= $options['empty_taxonomy_message'] ?></p> <?php
} 