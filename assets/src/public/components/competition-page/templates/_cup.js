export default /* html */ `
    <div v-if="!is_league(slot_props.slide.type)" :class="slot_props.base_class + '__cup'">
        <div v-for="round in slot_props.slide.rounds" :class="slot_props.base_class + '__cup__round'">
            <h3 :class="slot_props.base_class + '__cup__round__title'">{{ round.id }}</h3>

            <div v-for="fixture in round.fixtures" :class="slot_props.base_class + '__cup__round__fixture'">
                <div :class="slot_props.base_class + '__cup__round__fixture__team'">
                    <img :class="slot_props.base_class + '__cup__round__fixture__logo'" :src="fixture.teams[0].logo" />
                    <span :class="slot_props.base_class + '__cup__round__fixture__name'">{{ fixture.teams[0].alias || fixture.teams[0].title }}</span>
                </div>
                <span :class="slot_props.base_class + '__cup__round__fixture__score'">{{ fixture.scores[0] }}</span>
                <span :class="slot_props.base_class + '__cup__round__fixture__separator'">-</span>
                <span :class="slot_props.base_class + '__cup__round__fixture__score'">{{ fixture.scores[1] }}</span>
                <div :class="slot_props.base_class + '__cup__round__fixture__team'">
                    <img :class="slot_props.base_class + '__cup__round__fixture__logo'" :src="fixture.teams[1].logo" />
                    <span :class="slot_props.base_class + '__cup__round__fixture__name'">{{ fixture.teams[1].alias || fixture.teams[1].title }}</span>
                </div>
            </div>
        </div>
    </div>
`