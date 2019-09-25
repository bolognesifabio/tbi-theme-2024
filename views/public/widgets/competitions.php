<?php
use TBI\Helpers\Widgets as Widgets_Helper; ?>

<tbi-widget-competitions view_model="<?= htmlentities(json_encode($view_model)) ?>" inline-template>
    <?= $args['before_widget'] ?>
        <article class="widget--competitions">
            <header class="widget__header"> <?php
                Widgets_Helper::render_title($args, $instance);
                Widgets_Helper::render_cta("Vai alla competizione", "#"); ?>
            </header> <?php

            include get_template_directory() . "/views/public/widgets/competitions/navigation.php"; ?>

            <transition-group
                tag="ul"
                :class="{ 'slides': true, 'slides--full': are_both_columns_visible }"
                :name="slide"
            >
                <li
                    class="slides__item"
                    v-for="competition in loaded_competitions"
                    :key="competition.id"
                    v-show="competition.is_active"
                >
                    <nav v-if="competition.type === 'leagues' && !are_both_columns_visible" class="slides__item__tabs">
                        <button
                            :class="{ 'slides__item__tabs__cta': true, 'slides__item__tabs__cta--active': competition.are_standings_active }"
                            @click.prevent="() => { competition.are_standings_active = true }"
                        >Classifica</button>
                        
                        <button
                            :class="{ 'slides__item__tabs__cta': true, 'slides__item__tabs__cta--active': !competition.are_standings_active }"
                            @click.prevent="() => { competition.are_standings_active = false }"
                        >Risultati</button>
                    </nav> <?php

                    include get_template_directory(). "/views/public/widgets/competitions/standings.php";
                    include get_template_directory(). "/views/public/widgets/competitions/fixtures.php"; ?>
                </li>
            </transition-group>

            <footer class="widget__footer"> <?php
                Widgets_Helper::render_cta("Vai alla competizione", "#"); ?>
            </footer>
        </article>
    <?= $args['after_widget'] ?>
</tbi-widget-competitions>