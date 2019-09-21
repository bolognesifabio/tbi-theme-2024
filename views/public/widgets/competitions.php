<?php
use TBI\Helpers\Widgets as Widgets_Helper; ?>

<tbi-widget-competitions view_model="<?= htmlentities(json_encode($view_model)) ?>" inline-template>
    <?= $args['before_widget'] ?>
        <article class="widget--competitions">
            <header class="widget__header"> <?php
                Widgets_Helper::render_title($args, $instance);
                Widgets_Helper::render_cta("Vai alla competizione", "#"); ?>
            </header>

            <nav class="nav">
                <button
                    v-if="loaded_competitions.length > 1"
                    class="nav__cta"
                    @click.prevent="prev_slide()"
                >
                    <tbi-icon icon="caret-left"></tbi-icon>
                </button>
                
                <transition-group
                    tag="ul"
                    class="nav__competitions"
                    :name="slide"
                >
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
                    </nav>

                    <article class="standings" v-if="competition.are_standings_active || are_both_columns_visible">
                        <h3 class="standings__title">Classifica</h3>

                        <header class="standings__head">
                            <div class="standings__head__position">Pos</div>
                            <div class="standings__head__team">Squadra</div>
                            <div class="standings__head__played">G</div>
                            <div class="standings__head__points">Pt</div>
                        </header>

                        <div class="standings__row" v-for="(team, position) in competition.standings" :key="team.id">
                            <div class="standings__row__position">{{ position + 1 }}</div>
                            <div class="standings__row__team">
                                <div class="standings__row__team__emblem">
                                    <img class="standings__row__team__emblem__img" :src="team.emblem" />
                                </div>
                                {{ team.title }}
                            </div>
                            <div class="standings__row__played">{{ team.played }}</div>
                            <div class="standings__row__points">{{ team.points }}</div>
                        </div>
                    </article>

                    <article class="fixtures" v-if="!competition.are_standings_active || are_both_columns_visible">
                        <h3 class="fixtures__title">Risultati</h3>

                        <h4 class="fixtures__turn">
                            <tbi-icon class="fixtures__turn__icon" :icon="['far', 'calendar-alt']"></tbi-icon> {{ competition.turns.name }}
                        </h4>

                        <div v-for="(fixtures, fixtures_date in competition.turns.fixtures" class="fixtures__day">
                            <p class="fixtures__day__date" v-if="fixtures_date != '0'">{{ fixtures_date }}</p>

                            <article class="fixtures__day__list" v-if="!competition.are_standings_active || are_both_columns_visible">
                                <div class="fixtures__day__list__row" v-for="fixture in fixtures" :key="fixture.id" v-if="fixture.teams">
                                <div class="fixtures__day__list__row__team">
                                    <div class="fixtures__day__list__row__team__emblem">
                                        <img class="fixtures__day__list__row__team__emblem__img" :src="competition.teams[fixture.teams.home.id].emblem" />
                                    </div>
                                    {{ competition.teams[fixture.teams.home.id].short_name }}
                                </div>
                                <div class="fixtures__day__list__row__score">{{ fixture.teams.home.score }}</div>
                                <div class="fixtures__day__list__row__separator">-</div>
                                <div class="fixtures__day__list__row__score">{{ fixture.teams.away.score }}</div>
                                <div class="fixtures__day__list__row__team">
                                    {{ competition.teams[fixture.teams.away.id].short_name }}
                                    <div class="fixtures__day__list__row__team__emblem">
                                        <img class="fixtures__day__list__row__team__emblem__img" :src="competition.teams[fixture.teams.away.id].emblem" />
                                    </div>
                                </div>
                            </article>
                        </div>
                    </article>
                </li>
            </transition-group>

            <footer class="widget__footer"> <?php
                Widgets_Helper::render_cta("Vai alla competizione", "#"); ?>
            </footer>
        </article>
    <?= $args['after_widget'] ?>
</tbi-widget-competitions>