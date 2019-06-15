export default {
    props: {
        'slides': {
            default: []
        },
        'base_class': {
            default: ''
        },
        'show_logos': {
            default: false
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
                        <img :src="fixture.teams.home.info.emblem" />
                    </span>
                    <span v-if="fixture.teams.home.info" :class="[slot_props.base_class + '__fixture__team', 'home']">{{ fixture.teams.home.info.title }}</span>
                    <span :class="slot_props.base_class + '__fixture__score'">{{ fixture.teams.home.score }}</span>
                    <span :class="slot_props.base_class + '__fixture__separator'">-</span>
                    <span :class="slot_props.base_class + '__fixture__score'">{{ fixture.teams.away.score }}</span>
                    <span v-if="fixture.teams.away.info" :class="[slot_props.base_class + '__fixture__team', 'away']">{{ fixture.teams.away.info.title }}</span>
                    <span v-if="show_logos" :class="slot_props.base_class + '__fixture__logo'">
                        <img :src="fixture.teams.away.info.emblem" />
                    </span>
                </div>
            </template>

            <template slot="nav" slot-scope="slot_props">{{ slot_props.slide.id }}</template>
        </tbi-vue-carousel>
    `
}