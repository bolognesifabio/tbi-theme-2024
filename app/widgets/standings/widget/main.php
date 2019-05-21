<?php
$data = [
    'competitions' => $instance['competitions'],
    'seasons' => $instance['seasons']
]; ?>

<?= $args['before_widget'] ?>
    <div class="widget-standings">
        <?= $args['before_title'] ?>
            <?= $instance['title'] ?>
        <?= $args['after_title'] ?>

        <tbi-vue-widget-standings data-slides='<?= json_encode($data) ?>'></tbi-vue-widget-standings>
    </div>
<?= $args['after_widget'] ?>