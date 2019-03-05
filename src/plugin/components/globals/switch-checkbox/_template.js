export default /* html */ `
    <div :class="bem_base">
        <slot :bem_class="bem('input')" type="checkbox"></slot>
        <div :class="bem('interface')"></div>
    </div>
`