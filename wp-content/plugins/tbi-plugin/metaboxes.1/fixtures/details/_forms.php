<?php
$details_meta = get_post_meta($post->ID, 'tbi-fixtures-details', true) ?: []; ?>

<div class="fixtures-metaboxes__details">
    <tbi-field label="Seleziona la stagione">
        <select slot-scope="slot_props" :class="slot_props.bem_class">
            <option>Ciao</option>
        </select>
    </tbi-field>    
</div>