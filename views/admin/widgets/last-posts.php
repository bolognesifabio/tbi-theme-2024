<p class="tbi-widget__description">Mostra gli ultimi 5 articoli pubblicati tra le categorie selezionate.</p>

<div class="tbi-widget__field">
    <h3 class="tbi-widget__field__title" for="<?= $title_field_id ?>">Titolo:</h3>
    <input
        class="tbi-widget__field__input"
        id="<?= $title_field_id ?>"
        name="<?= $title_field_name ?>"
        type="text"
        value="<?= esc_attr($instance_title) ?>"
    />
</div>

<div class="tbi-widget__field tbi-widget__field--checkbox">
    <h3 class="tbi-widget__field__title">Categorie:</h3> <?php
    foreach ($all_categories as $category) { ?>
        <div class="tbi-widget__field__checkbox">
            <input
                class="tbi-widget__field__checkbox__input"
                name="<?= $category_field_name ?>[]"
                type="checkbox"
                value="<?= $category->term_id ?>"
                <?= in_array($category->term_id, $instance_categories) ? "checked" : "" ?>
            />
            <label class="tbi-widget__field__checkbox__label"><?= esc_html($category->name) ?></label>
        </div> <?php
    } ?>
</div>