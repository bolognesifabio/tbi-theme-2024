<?php
$competitions = [
    "value" => !empty($instance['competitions']) ? $instance['competitions'] : [],
    "id" => esc_attr($this->get_field_id('competitions')),
    "name" => esc_attr($this->get_field_name('competitions')),
    "categories" => get_categories(["taxonomy" => "competitions_taxonomy"])
]; ?>

<p>
    <span>Competizioni:</span>
    <ul> <?php
        foreach($competitions["categories"] as $category) { ?>
            <li>
                <input
                    name="<?= $competitions["name"] ?>[]"
                    type="checkbox"
                    value="<?= $category->term_id ?>"
                    <?= in_array($category->term_id, $competitions["value"]) ? "checked" : "" ?>
                />
                <?= $category->name ?>
            </li> <?php
        } ?>
    </ul>
</p>