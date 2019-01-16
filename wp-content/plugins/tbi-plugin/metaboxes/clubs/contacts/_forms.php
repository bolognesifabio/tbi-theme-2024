<?php
$contacts_meta = get_post_meta($post->ID, 'tbi-clubs-contacts', true) ?: []; ?>

<div class="clubs-metaboxes__contacts">
    <div class="clubs-metaboxes__contacts__field">
        <label class="clubs-metaboxes__contacts__field__label ">Citt&agrave;</label>
        <input class="clubs-metaboxes__contacts__field__input" type="text" value="<?= $contacts_meta['city'] ?: '' ?>" name="tbi-metaboxes-clubs-contacts-city" />
    </div>
    <div class="clubs-metaboxes__contacts__field clubs-metaboxes__contacts__field--narrow">
        <label class="clubs-metaboxes__contacts__field__label">Provincia</label>
        <input class="clubs-metaboxes__contacts__field__input" type="text" value="<?= $contacts_meta['province'] ?: '' ?>" name="tbi-metaboxes-clubs-contacts-province" />
    </div>
    <div class="clubs-metaboxes__contacts__field">
        <label class="clubs-metaboxes__contacts__field__label">Indirizzo</label>
        <input class="clubs-metaboxes__contacts__field__input" type="text" value="<?= $contacts_meta['address'] ?: '' ?>" name="tbi-metaboxes-clubs-contacts-address" />            
    </div>
    <div class="clubs-metaboxes__contacts__field">
        <label class="clubs-metaboxes__contacts__field__label">Telefono</label>
        <input class="clubs-metaboxes__contacts__field__input" type="tel" value="<?= $contacts_meta['phone'] ?: '' ?>" name="tbi-metaboxes-clubs-contacts-phone" />
    </div>
    <div class="clubs-metaboxes__contacts__field">
        <label class="clubs-metaboxes__contacts__field__label">Email</label>
        <input class="clubs-metaboxes__contacts__field__input" type="email" value="<?= $contacts_meta['email'] ?: '' ?>" name="tbi-metaboxes-clubs-contacts-email" />
    </div>
    <div class="clubs-metaboxes__contacts__field">
        <label class="clubs-metaboxes__contacts__field__label">Sito web</label>
        <input class="clubs-metaboxes__contacts__field__input" type="text" value="<?= $contacts_meta['website'] ?: '' ?>" name="tbi-metaboxes-clubs-contacts-website" />            
    </div>
</div>