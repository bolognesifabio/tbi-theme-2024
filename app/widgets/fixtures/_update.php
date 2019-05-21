<?php
$instance = [];
$instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : 'Calendario';
$instance['competitions'] = (!empty($new_instance['competitions'])) ? $new_instance['competitions'] : [];
$instance['seasons'] = (!empty($new_instance['seasons'])) ? $new_instance['seasons'] : null;