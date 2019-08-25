export default /* html */ `
    <div
        @mouseover="stop_autoplay()"
        @mouseout="resume_autoplay()"
        :class="[base_class, {active: is_active}]">
        <slot :slide="slide"></slot>
    </div>
`