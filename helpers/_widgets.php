<?php
namespace TBI\Helpers;

abstract class Widgets {
    public function render_cta($cta = "", $url = "#") { ?>
        <a class="widget__cta" href="<?= $url ?>">
            <?= $cta ?> <tbi-icon icon="chevron-right" class="widget__cta__icon"></tbi-icon>
        </a> <?php
    }

    public function render_title($args, $instance) { ?>
        <?= $args['before_title'] ?>
            <?= $instance['title'] ?>
        <?= $args['after_title']; ?> <?php
    }
}