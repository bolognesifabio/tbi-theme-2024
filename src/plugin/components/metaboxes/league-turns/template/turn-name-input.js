export default /* html */ `
    <input
        v-model="turn.name"
        type="text"
        :class="bem('list__item__header__value')"
        :name="'tbi-league-turns[' + turn_index + '][name]'"
    />    
`