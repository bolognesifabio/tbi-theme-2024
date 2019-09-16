<tbi-widget-competitions view_model="<?= htmlentities(json_encode($view_model)) ?>" inline-template>
    <?= $args['before_widget'] ?>
        <article class="widget--competitions">
            <?= $args['before_title'] ?>
                <?= $instance['title'] ?>
            <?= $args['after_title']; ?>

            <nav class="widget--competitions__nav">
                <button
                    v-if="loaded_competitions.length > 1"
                    class="widget--competitions__nav__cta"
                    @click.prevent="prev_slide()"
                >
                    <tbi-icon icon="caret-left"></tbi-icon>
                </button>
                
                <transition-group
                    tag="ul"
                    class="widget--competitions__nav__competitions"
                    :name="slide"
                >
                    <li
                        class="widget--competitions__nav__competitions__item"
                        v-for="competition in loaded_competitions"
                        :key="competition.id"
                        v-if="competition.is_active"
                    >
                        <h3 class="widget--competitions__nav__competitions__item__title">{{ competition.competition.name }}</h3>
                        <h4 class="widget--competitions__nav__competitions__item__subtitle">{{ competition.title }}</h4>
                    </li>
                </transition-group>

                <button
                    v-if="loaded_competitions.length > 1"
                    class="widget--competitions__nav__cta"
                    @click.prevent="next_slide()"
                >
                    <tbi-icon icon="caret-right"></tbi-icon>
                </button>
            </nav>

            <a class="widget__cta" href="#">
                Vai al campionato
                <tbi-icon icon="chevron-right" class="widget__cta__cta__icon"></tbi-icon>
            </a>
        </article>
    <?= $args['after_widget'] ?>
</tbi-widget-competitions>