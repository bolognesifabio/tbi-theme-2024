<tbi-widget-competitions inline-template>
    <?= $args['before_widget'] ?>
        <article class="widget--competitions">
            <?= $args['before_title'] ?>
                <?= $instance['title'] ?>
            <?= $args['after_title']; ?>

            <a class="widget__cta" href="#">
                Vai al campionato
                <tbi-icon icon="chevron-right" class="widget__cta__cta__icon"></tbi-icon>
            </a>
        </article>
    <?= $args['after_widget'] ?>
</tbi-widget-competitions>