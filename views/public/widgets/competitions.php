<tbi-widget-competitions view_model="<?= htmlentities(json_encode($view_model)) ?>" inline-template>
    <?= $args['before_widget'] ?>
        <article class="widget--competitions">
            <?= $args['before_title'] ?>
                <?= $instance['title'] ?>
            <?= $args['after_title']; ?>

            <!-- <nav>
                <ul>
                    <li v-for="competition in loaded_competitions" :key="competition.id">{{ competition.title }}</li>
                </ul>
            </nav> -->

            <a class="widget__cta" href="#">
                Vai al campionato
                <tbi-icon icon="chevron-right" class="widget__cta__cta__icon"></tbi-icon>
            </a>
        </article>
    <?= $args['after_widget'] ?>
</tbi-widget-competitions>