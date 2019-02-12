<?php
include "_fields.php";

$contacts_meta = get_post_meta($post->ID, 'tbi-clubs-contacts', true) ?: [] ?>

<ul class="clubs-metaboxes__contacts"> <?php
    foreach ($fields as $field) {
        $is_narrow = $field['name'] === 'province' ? 'true' : 'false'; ?>

        <tbi-field label="<?= $field['label'] ?>">
            <input
                slot-scope="slot_props"
                name="tbi-metaboxes-clubs-contacts-<?= $field['name'] ?>"
                type="<?= $field['type'] ?>"
                value="<?= $contacts_meta[$field['name']] ?: '' ?>"
                :class="[slot_props.bem_class, { 'narrow': <?= $is_narrow ?> }]"
                <?= $field['maxlength'] ? 'maxlength="'. $field['maxlength'] .'"': '' ?>
            />
        </tbi-field> <?php
    } ?>
</ul>