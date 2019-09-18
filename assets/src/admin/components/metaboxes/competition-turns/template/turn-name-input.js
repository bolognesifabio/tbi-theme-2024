export default /* html */ `
    <input
        v-model="turn.name"
        type="text"
        :class="bem('list__item__header__value')"
        :name="'tbi-competition-turns[' + turn_index + '][name]'"
    />

    <input
        v-model="turn.show_date"
        type="date"
        :class="bem('list__item__header__value')"
        :name="'tbi-competition-turns[' + turn_index + '][show_date]'"
    />
`