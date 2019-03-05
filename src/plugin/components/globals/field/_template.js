export default /* html */ `
    <li :class="bem_base">
        <label v-if="label" :class="bem('label')">{{ label }}</label>
        <slot :bem_class="bem('input')"></slot>
    </li>
`