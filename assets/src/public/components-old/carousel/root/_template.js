export default `
    <div :class="base_class">
        <div :class="[base_class + '__slides', {'next': going_next}, {'prev': going_prev}]">
            <tbi-vue-carousel-slide
                v-for="slide in slides"
                :key="slide.id"
                :slide="slide"
                :active_slide="active_slide"
                :base_class="base_class + '__slides__element'"
                :stop_autoplay="stop_autoplay"
                :resume_autoplay="resume_autoplay"
            >
                <template slot-scope="slot_props">
                    <slot name="slide" :slide="slot_props.slide" :base_class="base_class + '__slides__element'"></slot>
                </template>
            </tbi-vue-carousel-slide>
        </div>

        <div :class="base_class + '__navigation'" v-if="navigation">
            <tbi-vue-carousel-navigation
                v-for="slide in slides"
                :key="slide.id"
                :slide="slide"
                :active_slide="active_slide"
                :base_class="base_class + '__navigation__element'"
                :switch_slide="switch_slide"
                :stop_autoplay="stop_autoplay"
                :resume_autoplay="resume_autoplay"
            >
                <template slot-scope="slot_props">
                    <slot name="nav" :slide="slot_props.slide" :base_class="base_class + '__navigation__element'"></slot>
                </template>
            </tbi-vue-carousel-navigation>
        </div>
        
        <tbi-vue-carousel-arrows
            v-if="show_arrows"
            :base_class="base_class"
            :switch_slide="switch_slide"
            :get_next_prev_slide="get_next_prev_slide"
        ></tbi-vue-carousel-arrows>
    </div>
`