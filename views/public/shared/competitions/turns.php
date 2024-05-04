<article :class="{ 'fixtures': true, 'fixtures--cup': is_cup }">
    <h3 class="fixtures__title">Risultati</h3>

    <header class="fixtures__header">
        <tbi-icon class="fixtures__header__icon" :icon="['far', 'calendar-alt']"></tbi-icon>
        <select class="fixtures__header__selection" v-if="has_multiple_turns" v-model="selected_turn_index">
            <option v-for="(turn, turn_index) in turns" :key="turn_index" :value="turn_index">
                {{ turn.name }}
            </option>
        </select>
        <h4 class="fixtures__header__title" v-else>{{ selected_turn.name }}</h4>
    </header>

    <div :class="{ 'fixtures__turn': true, 'fixtures__turn--has-venues': selected_turn.has_venues }">
        <div class="fixtures__turn__child" v-for="(turn_child, turn_child_index) in selected_turn.children" :key="turn_child_index">
            <h4 class="fixtures__turn__child__title" v-if="turn_child.title">{{ turn_child.title }}</h4>

            <div class="fixtures__turn__child__day" v-for="(fixtures, date) in turn_child.days">
                <p class="fixtures__turn__child__day__date" v-if="date">{{ date }}</p>

                <div class="fixture" v-for="fixture in fixtures" :key="fixture.id" v-if="fixture.teams">
                    <div class="fixture__team">
                        <div class="fixture__team__emblem">
                            <img class="fixture__team__emblem__img" :src="teams[fixture.teams.home.id].emblem" />
                        </div>
                        <span class="fixture__team__name fixture__team__name--full">{{ teams[fixture.teams.home.id].title }}</span>
                        <span class="fixture__team__name fixture__team__name--short">{{ teams[fixture.teams.home.id].short_name }}</span>
                    </div>

                    <div class="fixture__score">{{ fixture.teams.home.score }}</div>
                    <div class="fixture__separator">-</div>
                    <div class="fixture__score">{{ fixture.teams.away.score }}</div>
                    
                    <div class="fixture__team">
                        <span class="fixture__team__name fixture__team__name--full">{{ teams[fixture.teams.away.id].title }}</span>
                        <span class="fixture__team__name fixture__team__name--short">{{ teams[fixture.teams.away.id].short_name }}</span>
                        <div class="fixture__team__emblem">
                            <img class="fixture__team__emblem__img" :src="teams[fixture.teams.away.id].emblem" />
                        </div>
                    </div>

                    <div class="fixture__venue" v-if="fixture.place">
                        <tbi-icon class="fixture__venue__icon" icon="map-marker-alt"></tbi-icon>
                        {{ fixture.place }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>