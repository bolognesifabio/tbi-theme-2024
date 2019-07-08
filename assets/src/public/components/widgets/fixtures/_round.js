export default {
    props: {
        'slides': {
            default() {
                return []
            }
        },
        'base_class': {
            default: ''
        },
        'show_logos': {
            default: false
        },
        'teams': {
            default() {
                return []
            }
        }
    },
    methods: {
        team_from_id(team_id) {
            return this.teams.find(team => {
                return team.id == team_id
            })
        }
    },
    mounted() {
        this.slides = this.slides
    },
    template: /* html */ `
        <tbi-vue-carousel
            :slides="slides"
            :base_class="base_class"
            :navigation="true"
            :starting_slide="slides[0].id"
        >
            <template slot="slide" slot-scope="slot_props">
                <div v-for="fixture in slot_props.slide.fixtures" :class="slot_props.base_class + '__fixture'">
                    <span v-if="show_logos" :class="slot_props.base_class + '__fixture__logo'">
                        <img v-if="team_from_id(fixture.teams.home.id)" :src="team_from_id(fixture.teams.home.id).emblem" />
                    </span>
                    <span v-if="team_from_id(fixture.teams.home.id)" :class="[slot_props.base_class + '__fixture__team', 'home']">{{ team_from_id(fixture.teams.home.id).title }}</span>
                    <span :class="slot_props.base_class + '__fixture__score'">{{ fixture.teams.home.score }}</span>
                    <span :class="slot_props.base_class + '__fixture__separator'">-</span>
                    <span :class="slot_props.base_class + '__fixture__score'">{{ fixture.teams.away.score }}</span>
                    <span v-if="team_from_id(fixture.teams.away.id)" :class="[slot_props.base_class + '__fixture__team', 'away']">{{ team_from_id(fixture.teams.away.id).title }}</span>
                    <span v-if="show_logos" :class="slot_props.base_class + '__fixture__logo'">
                        <img v-if="team_from_id(fixture.teams.away.id)" :src="team_from_id(fixture.teams.away.id).emblem" />
                    </span>
                </div>
            </template>

            <template slot="nav" slot-scope="slot_props">{{ slot_props.slide.id }}</template>
        </tbi-vue-carousel>
    `
}