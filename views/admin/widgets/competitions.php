<p class="tbi-widget__description">Mostra classifiche e calendari per le competizioni e la stagione selezionate.</p>

<div class="tbi-widget__field">
    <h3 class="tbi-widget__field__title" for="<?= $title_field["id"] ?>">Titolo:</h3>
    <input
        class="tbi-widget__field__input"
        id="<?= $title_field["id"] ?>"
        name="<?= $title_field["name"] ?>"
        type="text"
        value="<?= esc_attr($title_field["value"]) ?>"
    />
</div>

<div class="tbi-widget__field tbi-widget__field--radio">
    <h3 class="tbi-widget__field__title">Stagione:</h3> <?php
    foreach ($seasons_field["categories"] as $category) { ?>
        <div class="tbi-widget__field__radio">
            <input
                class="tbi-widget__field__radio__input"
                name="<?= $seasons_field["name"] ?>"
                type="radio"
                value="<?= $category->term_id ?>"
                <?= $seasons_field["value"] == $category->term_id ? "checked" : "" ?>
            />
            <label class="tbi-widget__field__radio__label"><?= esc_html($category->name) ?></label>
        </div> <?php
    } ?>
</div>

<div class="tbi-widget__field tbi-widget__field--checkbox">
    <h3 class="tbi-widget__field__title">Competizioni:</h3> <?php
    foreach ($competitions_field["categories"] as $category) { ?>
        <div class="tbi-widget__field__checkbox">
            <input
                class="tbi-widget__field__checkbox__input"
                name="<?= $competitions_field["name"] ?>[]"
                type="checkbox"
                value="<?= $category->term_id ?>"
                <?= in_array($category->term_id, $competitions_field["value"]) ? "checked" : "" ?>
            />
            <label class="tbi-widget__field__checkbox__label"><?= esc_html($category->name) ?></label>
        </div> <?php
    } ?>
</div>