export default /* html */ `
    <div v-if="!is_league(slot_props.slide.type)" :class="slot_props.base_class + '__cup'">
        <div v-for="turn in slot_props.slide.turns" :class="slot_props.base_class + '__cup__round'">
            <h3 :class="slot_props.base_class + '__cup__round__title'">{{ turn.id }}</h3>

            <div v-for="fixture in turn.fixtures" :class="slot_props.base_class + '__cup__round__fixture'">
                <div :class="slot_props.base_class + '__cup__round__fixture'" v-if="fixture.teams">
                    <div :class="slot_props.base_class + '__cup__round__fixture__team'">
                        <img :class="slot_props.base_class + '__cup__round__fixture__logo'" v-if="team_from_id(fixture.teams.home.id, slot_props.slide.teams)" :src="team_from_id(fixture.teams.home.id, slot_props.slide.teams).emblem" />
                        <span v-if="team_from_id(fixture.teams.home.id, slot_props.slide.teams)" :class="[slot_props.base_class + '__fixture__team', 'home']">{{ team_from_id(fixture.teams.home.id, slot_props.slide.teams).title }}</span>
                    </div>

                    <span :class="slot_props.base_class + '__cup__round__fixture__score'">{{ fixture.teams.home.score }}</span>
                    <span :class="slot_props.base_class + '__cup__round__fixture__separator'">-</span>
                    <span :class="slot_props.base_class + '__cup__round__fixture__score'">{{ fixture.teams.away.score }}</span>

                    <div :class="slot_props.base_class + '__cup__round__fixture__team'">
                        <img :class="slot_props.base_class + '__cup__round__fixture__logo'" v-if="team_from_id(fixture.teams.away.id, slot_props.slide.teams)" :src="team_from_id(fixture.teams.away.id, slot_props.slide.teams).emblem" />
                        <span v-if="team_from_id(fixture.teams.away.id, slot_props.slide.teams)" :class="[slot_props.base_class + '__fixture__team', 'home']">{{ team_from_id(fixture.teams.away.id, slot_props.slide.teams).title }}</span>
                    </div>
                </div>

                <h4 v-if="!fixture.teams">{{ fixture.title }}</h4>
            </div>
        </div>
    </div>
`


/* <div :class="slot_props.base_class + '__cup__round__fixture__team'">
                    <img :class="slot_props.base_class + '__cup__round__fixture__logo'" :src="fixture.teams[0].logo" />
                    <span :class="slot_props.base_class + '__cup__round__fixture__name'">{{ fixture.teams.home.alias || fixture.teams[0].title }}</span>
                </div>
                <span :class="slot_props.base_class + '__cup__round__fixture__score'">{{ fixture.scores[0] }}</span>
                <span :class="slot_props.base_class + '__cup__round__fixture__separator'">-</span>
                <span :class="slot_props.base_class + '__cup__round__fixture__score'">{{ fixture.scores[1] }}</span>
                <div :class="slot_props.base_class + '__cup__round__fixture__team'">
                    <img :class="slot_props.base_class + '__cup__round__fixture__logo'" :src="fixture.teams[1].logo" />
                    <span :class="slot_props.base_class + '__cup__round__fixture__name'">{{ fixture.teams[1].alias || fixture.teams[1].title }}</span>
                </div>*/