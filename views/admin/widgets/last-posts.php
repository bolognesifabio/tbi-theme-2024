<p class="tbi-widget__description">Mostra gli ultimi 5 articoli pubblicati tra le categorie selezionate.</p>

<div class="tbi-widget__field">
    <label class="tbi-widget__field__label" for="<?= $title_field_id ?>">Titolo:</label>
    <input
        class="tbi-widget__field__input"
        id="<?= $title_field_id ?>"
        name="<?= $title_field_name ?>"
        type="text"
        value="<?= esc_attr($instance_title) ?>"
    />
</div>

<div class="tbi-widget__field">
    <label class="tbi-widget__field__label">Categorie:</label> <?php
    foreach ($all_categories as $category) { ?>
        <input
            class="tbi-widget__field__checkbox"
            name="<?= $category_field_name ?>[]"
            type="checkbox"
            value="<?= $category->term_id ?>"
            <?= in_array($category->term_id, $instance_categories) ? "checked" : "" ?>
        /><?= esc_html($category->name) ?> <?php
    } ?>
</div>