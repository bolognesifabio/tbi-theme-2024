
<article class="fixtures" v-if="!competition.are_standings_active || are_both_columns_visible">
    <h3 class="fixtures__title">Risultati</h3>

    <h4 class="fixtures__turn">
        <tbi-icon class="fixtures__turn__icon" :icon="['far', 'calendar-alt']"></tbi-icon> {{ competition.turns.name }}
    </h4>

    <div v-for="(turn_child, turn_child_index) in competition.turns.children" class="fixtures__day" :key="turn_child_index">
        <h4 v-if="turn_child.title">{{ turn_child.title }}</h4>

        <div v-for="(fixtures, date) in turn_child.days">
            <p v-if="date">{{ date }}</p>

            <article class="fixtures__day__list">
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
        <!-- <p class="fixtures__day__date" v-if="fixtures_date != '0'">{{ fixtures_date }}</p>

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
        </article> -->
    </div>
</article>