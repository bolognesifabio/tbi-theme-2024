import { cup, standings, fixtures } from './templates'

export default /* html */ `
    <tbi-vue-carousel
        :slides="slides"
        :base_class="base_class"
        :navigation="true"
    >

        <template slot="slide" slot-scope="slot_props">
            <h3 v-if="slot_props.slide.excerpt" :class="slot_props.base_class + '__excerpt'">{{ slot_props.slide.excerpt }}</h3>

            ${cup}

            ${standings}
            
            ${fixtures}

            <p :class="slot_props.base_class + '__content'">{{ slot_props.slide.content }}</p>
        </template>

        <template v-if="show_navigation" slot="nav" slot-scope="slot_props">{{ slot_props.slide.title }}</template>
    </tbi-vue-carousel>
`