<?php
$title = [
    "value" => !empty($instance['title']) ? $instance['title'] : 'Calendario',
    "id" => esc_attr($this->get_field_id('title')),
    "name" => esc_attr($this->get_field_name('title'))
]; ?>

<p>
    <label for="<?= $title["id"] ?>">Titolo:</label>
    <input class="widefat" id="<?= $title["id"] ?>" name="<?= $title["name"] ?>" type="text" value="<?= $title["value"] ?>">
</p>