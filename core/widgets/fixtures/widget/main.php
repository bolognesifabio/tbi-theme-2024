<?php

$data = [
    'competitions' => $instance['competitions'],
    'seasons' => $instance['seasons']
]; ?>

<?= $args['before_widget'] ?>
    <div class="widget-fixtures">
        <?= $args['before_title'] ?>
            <?= $instance['title'] ?>
        <?= $args['after_title'] ?>
        
        <tbi-vue-widget-fixtures data-slides='<?= json_encode($data) ?>'></tbi-vue-widget-fixtures>
    </div>
<?= $args['after_widget'] ?>
