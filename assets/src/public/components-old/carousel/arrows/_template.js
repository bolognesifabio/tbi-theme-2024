export default /* html */ `
    <div :class="base_class + '__arrows'">
        <div
            @click.prevent="switch_slide(get_next_prev_slide(false))"
            :class="[base_class + '__arrows__element', 'prev']"
        ></div>

        <div
            @click.prevent="switch_slide(get_next_prev_slide(true))"
            :class="[base_class + '__arrows__element', 'next']"
        ></div>
    </div>
`