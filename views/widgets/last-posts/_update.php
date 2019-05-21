<?php
$instance = [];
$instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : 'News';
$instance['categories'] = !empty($new_instance['categories']) ? $new_instance['categories'] : null;
