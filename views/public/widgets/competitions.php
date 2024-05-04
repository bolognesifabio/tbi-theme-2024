<?php
use TBI\Helpers\Widgets as Widgets_Helper;
$widgetsHelper = new Widgets_Helper;
?>

<tbi-widget-competitions view_model="<?= htmlentities(json_encode($view_model)) ?>" inline-template>
    <?= $args['before_widget'] ?>
        <article class="widget--competitions">
            <header class="widget__header"> <?php
                $widgetsHelper->render_title($args, $instance);
                $widgetsHelper->render_cta("Vai alla competizione", "#"); ?>
            </header>
            
            <nav class="nav">
                <button
                    v-if="loaded_competitions.length > 1"
                    class="nav__cta"
                    @click.prevent="prev_slide()"
                >
                    <tbi-icon icon="caret-left"></tbi-icon>
                </button>
                
                <transition-group tag="ul" class="nav__competitions" :name="slide">
                    <li
                        class="nav__competitions__item"
                        v-for="competition in loaded_competitions"
                        :key="competition.id"
                        v-show="competition.is_active"
                    >
                        <h3 class="nav__competitions__item__title">{{ competition.competition.name }}</h3>
                        <h4 class="nav__competitions__item__subtitle">{{ competition.title }}</h4>
                    </li>
                </transition-group>

                <button
                    v-if="loaded_competitions.length > 1"
                    class="nav__cta"
                    @click.prevent="next_slide()"
                >
                    <tbi-icon icon="caret-right"></tbi-icon>
                </button>
            </nav>

            <transition-group tag="ul" class="slides" :name="slide">
                <li
                    :class="{ 'slides__item': true, 'slides__item--league': competition.type !== 'cups' }"
                    v-for="competition in loaded_competitions"
                    :key="competition.id"
                    v-show="competition.is_active"
                >
                    <nav v-if="competition.type === 'leagues'" class="slides__item__tabs">
                        <button
                            :class="{ 'slides__item__tabs__cta': true, 'slides__item__tabs__cta--active': competition.are_standings_active }"
                            @click.prevent="function() { competition.are_standings_active = true }"
                        >Classifica</button>
                        
                        <button
                            :class="{ 'slides__item__tabs__cta': true, 'slides__item__tabs__cta--active': !competition.are_standings_active }"
                            @click.prevent="function() { competition.are_standings_active = false }"
                        >Risultati</button>
                    </nav>

                    <template v-if="competition.are_standings_active"> <?php
                        include get_template_directory(). "/views/public/shared/competitions/standings.php"; ?>
                    </template>
                    <tbi-competition-turns v-show="!competition.are_standings_active" inline-template :turns="competition.turns" :teams="competition.teams" :is_cup="competition.type === 'cups'"> <?php
                        include get_template_directory(). "/views/public/shared/competitions/turns.php"; ?>
                    </tbi-competition-turns>
                </li>
            </transition-group>

            <footer class="widget__footer"> <?php
                // @TODO: Add link to competition
                $widgetsHelper->render_cta("Vai alla competizione", "#"); ?>
            </footer>
        </article>
    <?= $args['after_widget'] ?>
</tbi-widget-competitions>