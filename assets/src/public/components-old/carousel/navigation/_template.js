export default /* html */ `
    <div
        @click.prevent="switch_slide(slide.id)"
        :class="[base_class, {active: is_active}]">
        <slot :slide="slide"></slot>
    </div>
`