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
                                <td class="team">{{ team.short_name }}</td>
                                <td class="played">{{ team.played }}</td>
                                <td class="points">{{ team.points }}</td>
                            </tr>
                        </tbody>
                    </table>
                </li>
            </transition-group>

            <a class="widget__cta" href="#">
                Vai al campionato
                <tbi-icon icon="chevron-right" class="widget__cta__icon"></tbi-icon>
            </a>
        </article>
    <?= $args['after_widget'] ?>
</tbi-widget-competitions>