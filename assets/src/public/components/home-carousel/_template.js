export default /* html */ `
    <tbi-vue-carousel
        v-show="is_not_empty"
        :slides="slides"
        :base_class="base_class"
        :autoplay="true"
        :navigation="true"
    >
        <template slot="slide" slot-scope="slot_props">
            <div :class="slot_props.base_class + '__image'">
                <img :src="slot_props.slide.img || ''" />
            </div>
            <div :class="slot_props.base_class + '__content'">
                <h3 :class="slot_props.base_class + '__content__title'">{{ slot_props.slide.title }}</h3>
                <a :class="slot_props.base_class + '__content__cta'" :href="slot_props.slide.url">Vai all'articolo</a>
            </div>
        </template>
    </tbi-vue-carousel>
`