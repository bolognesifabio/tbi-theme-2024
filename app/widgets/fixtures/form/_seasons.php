<?php
$seasons = [
    "value" => !empty($instance['seasons']) ? $instance['seasons'] : 0,
    "id" => esc_attr($this->get_field_id('seasons')),
    "name" => esc_attr($this->get_field_name('seasons')),
    "categories" => get_categories(["taxonomy" => "seasons"])
]; ?>

<p>
    <span>Stagioni:</span>
    <ul> <?php
        foreach($seasons["categories"] as $category) { ?>
            <li>
                <input
                    name="<?= $seasons["name"] ?>"
                    type="radio"
                    value="<?= $category->term_id ?>"
                    <?= $seasons["value"] == $category->term_id ? "checked" : "" ?>
                />
                <?= $category->name ?>
            </li> <?php
        } ?>
    </ul>
</p>