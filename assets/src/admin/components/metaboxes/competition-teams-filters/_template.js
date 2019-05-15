export default /* html */ `
    <div :class="bem_base">
        <h4 :class="bem('title')">Filtri</h4>
        <div :class="bem('field')">
            <input :class="bem('field__value')" type="checkbox" v-model="$root.state.filters.are_inactive_hidden" />
            <label :class="bem('field__label')">Mostra solo squadre attive</label>
        </div>

        <div :class="bem('field')">
            <input :class="bem('field__value')" type="checkbox" v-model="$root.state.filters.are_no_page_hidden" />
            <label :class="bem('field__label')">Mostra solo squadre con una pagina</label>
        </div>

        <div :class="bem('field')">
            <input :class="bem('field__value')" type="checkbox" v-model="$root.state.filters.are_unselected_hidden" />
            <label :class="bem('field__label')">Mostra solo squadre selezionate</label>
        </div>
    </diV>
`