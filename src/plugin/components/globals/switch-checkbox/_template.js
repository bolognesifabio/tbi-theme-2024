export default /* html */ `
    <div :class="base_class">
        <slot :bem_class="get_bem('input')" type="checkbox"></slot>
        <div :class="get_bem('interface')"></div>
    </div>
`