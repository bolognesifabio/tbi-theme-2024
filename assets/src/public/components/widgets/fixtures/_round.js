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
                        <img :src="fixture.teams[0].logo" />
                    </span>
                    <span :class="[slot_props.base_class + '__fixture__team', 'home']">{{ fixture.teams[0].alias || fixture.teams[0].title }}</span>
                    <span :class="slot_props.base_class + '__fixture__score'">{{ fixture.scores[0] }}</span>
                    <span :class="slot_props.base_class + '__fixture__separator'">-</span>
                    <span :class="slot_props.base_class + '__fixture__score'">{{ fixture.scores[1] }}</span>
                    <span :class="[slot_props.base_class + '__fixture__team', 'away']">{{ fixture.teams[1].alias || fixture.teams[1].title }}</span>
                    <span v-if="show_logos" :class="slot_props.base_class + '__fixture__logo'">
                        <img :src="fixture.teams[1].logo" />
                    </span>
                </div>
            </template>

            <template slot="nav" slot-scope="slot_props">{{ slot_props.slide.id }}</template>
        </tbi-vue-carousel>
    `
}