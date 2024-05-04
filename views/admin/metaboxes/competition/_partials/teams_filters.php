<tbi-competition-teams-filters inline-template>
    <div :class="bem_base">
        <h4 class="title">Filtri</h4>
        <div class="field">
            <input class="field__value" type="checkbox" v-model="$root.state.filters.are_inactive_hidden" />
            <label class="field__label">Mostra solo squadre attive</label>
        </div>

        <div class="field">
            <input class="field__value" type="checkbox" v-model="$root.state.filters.are_no_page_hidden" />
            <label class="field__label">Mostra solo squadre con una pagina</label>
        </div>

        <div class="field">
            <input class="field__value" type="checkbox" v-model="$root.state.filters.are_unselected_hidden" />
            <label class="field__label">Mostra solo squadre selezionate</label>
        </div>
    </diV>
</tbi-competition-teams-filters>