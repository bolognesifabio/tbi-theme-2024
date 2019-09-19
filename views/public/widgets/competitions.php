<tbi-widget-competitions view_model="<?= htmlentities(json_encode($view_model)) ?>" inline-template>
    <?= $args['before_widget'] ?>
        <article class="widget--competitions">
            <?= $args['before_title'] ?>
                <?= $instance['title'] ?>
            <?= $args['after_title']; ?>

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
                class="slides"
                :name="slide"
            >
                <li
                    class="slides__item"
                    v-for="competition in loaded_competitions"
                    :key="competition.id"
                    v-show="competition.is_active"
                >
                    <nav v-if="competition.type === 'leagues'" class="slides__item__tabs">
                        <button
                            :class="{ 'slides__item__tabs__cta': true, 'slides__item__tabs__cta--active': competition.are_standings_active }"
                            @click.prevent="() => { competition.are_standings_active = true }"
                        >Classifica</button>
                        
                        <button
                            :class="{ 'slides__item__tabs__cta': true, 'slides__item__tabs__cta--active': !competition.are_standings_active }"
                            @click.prevent="() => { competition.are_standings_active = false }"
                        >Risultati</button>
                    </nav>
                        
                    <table cellspacing="0" cellpadding="0" class="slides__item__standings" v-if="competition.are_standings_active">
                        <thead class="slides__item__standings__head">
                            <tr>
                                <th class="position">Pos</th>
                                <th class="team" colspan="2">Squadra</th>
                                <th class="played">G</th>
                                <th class="points">Pt</th>
                            </tr>
                        </thead>
                        <tbody class="slides__item__standings__body">
                            <tr v-for="(team, position) in competition.standings" :key="team.id">
                                <td class="position">{{ position + 1 }}</td>
                                <td class="emblem">
                                    <img class="emblem__img" :src="team.emblem" />
                                </td>
                                <td class="team">{{ team.title }}</td>
                                <td class="played">{{ team.played }}</td>
                                <td class="points">{{ team.points }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <article class="slides__item__fixtures" v-else>
                        <h3 class="slides__item__fixtures__turn">
                            <tbi-icon :icon="['far', 'calendar-alt']"></tbi-icon> {{ competition.turns.name }}
                        </h3>

                        <div v-for="(fixtures, fixtures_date in competition.turns.fixtures" class="slides__item__fixtures__day">
                            <p class="slides__item__fixtures__day__date" v-if="fixtures_date">{{ fixtures_date }}</p>
                            
                            <table cellspacing="0" cellpadding="0" class="slides__item__fixtures__day__list">
                                <tbody>
                                    <tr v-for="fixture in fixtures" :key="fixture.id" class="fixture">
                                        <td class="fixture__emblem">
                                            <img class="fixture__emblem__img" :src="competition.teams[fixture.teams.home.id].emblem" />
                                        </td>
                                        <td class="fixture__team">{{ competition.teams[fixture.teams.home.id].title }}</td>
                                        <td class="fixture__score">{{ fixture.teams.home.score }}</td>
                                        <td class="fixture__separator">-</td>
                                        <td class="fixture__score">{{ fixture.teams.away.score }}</td>
                                        <td class="fixture__team">{{ competition.teams[fixture.teams.away.id].title }}</td>
                                        <td class="fixture__emblem">
                                            <img class="fixture__emblem__img" :src="competition.teams[fixture.teams.away.id].emblem" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </article>
                </li>
            </transition-group>

            <a class="widget__cta" href="#">
                Vai al campionato
                <tbi-icon icon="chevron-right" class="widget__cta__icon"></tbi-icon>
            </a>
        </article>
    <?= $args['after_widget'] ?>
</tbi-widget-competitions>