<?php
$details_meta = get_post_meta($post->ID, 'tbi-teams-details', true) ?: []; ?>

<ul class="teams-metaboxes__details">
    <tbi-field label="Nome breve">
        <input
            slot-scope="slot_props"
            name="tbi-metaboxes-teams-details-short-name"
            type="text"
            value="<?= $details_meta['short-name'] ?: '' ?>"
            :class="slot_props.bem_class"
        />
    </tbi-field>

    <tbi-field label="Sigla" is_narrow="true">
        <input
            slot-scope="slot_props"
            name="tbi-metaboxes-teams-details-team-code"
            type="text"
            value="<?= $details_meta['team-code'] ?: '' ?>"
            maxlength="3"
            :class="[slot_props.bem_class, 'narrow']"
        />
    </tbi-field>

    <tbi-field label="Non più in attivit&agrave;">
        <tbi-switch-checkbox>
            <input
                slot-scope="slot_props"
                name="tbi-metaboxes-teams-details-is-inactive"
                :class="slot_props.bem_class"
                :type="slot_props.type"
                <?= $details_meta['is-inactive'] ? 'checked' : '' ?>
            />
        </tbi-switch-checkbox>
    </tbi-field>
</ul>