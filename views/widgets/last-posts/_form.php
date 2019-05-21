<?php
$title = !empty($instance['title']) ? $instance['title'] : esc_html__('News', 'text_domain');
$title_ID = esc_attr($this->get_field_id('title'));
$title_name = esc_attr($this->get_field_name('title'));

$instanceCategories = $instance['categories'] ? $instance['categories'] : [];
$categories = get_categories();
$category_name = esc_attr($this->get_field_name('categories')); ?>

<p>
    <label for="<?= $title_ID ?>">
        <?php esc_attr_e( 'Titolo:', 'text_domain' ); ?>
    </label>
    <input class="widefat" id="<?= $title_ID ?>" name="<?= $title_name ?>" type="text" value="<?= esc_attr($title); ?>">
</p>

<p>
    <label>
        <?php esc_attr_e('Categorie:', 'text_domain'); ?>
    </label> <?php

    foreach($categories as $category) { ?>
        <br><input type="checkbox" <?= in_array($category->term_id, $instanceCategories) ? "checked" : "" ?> name="<?= $category_name ?>[]" value="<?= $category->term_id ?>" /><?= esc_html($category->name) ?> <?php
    } ?>
</p>

<?php
