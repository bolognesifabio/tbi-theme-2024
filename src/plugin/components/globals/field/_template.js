export default /* html */ `
    <li :class="base_class">
        <label v-if="label" :class="get_bem('label')">{{ label }}</label>
        <slot :bem_class="get_bem('input')"></slot>
    </li>
`