<div
    :class="bem('heading')"
    @dragover="event => prevent_if_droppable(event)"
    @dragleave="remove_dragged_over_class"
    @drop.prevent="drop_turn"
>
    <div
        :class="bem('heading__drag-area')"
        @dragend="() => is_currently_dragged = false"
        @dragstart="update_turns_dragged_data"
        draggable="true"
    ></div>

    <input :class="bem('heading__input')" v-model="turn.name" :name="'tbi-competitions-turns[' + index + '][name]'" />

    <button :class="bem('heading__button', { 'delete': true })" @click.prevent="remove_turn">Elimina turno</button>
    <button :class="bem('heading__button', { 'add': true })" @click.prevent="add_fixture">Aggiungi partita</button>
    <button :class="bem('heading__button', { 'open': true })" @click.prevent="open_close_turn"></button>
</div>

<div v-if="has_turn_fixtures" :class="bem('fixtures-heading')">
    <h4 :class="bem('fixtures-heading__team')">Squadra in casa</h4>
    <h4 :class="bem('fixtures-heading__results')">Risultato</h4>
    <h4 :class="bem('fixtures-heading__team')">Squadra in trasferta</h4>
    <h4 :class="bem('fixtures-heading__place')">Luogo</h4>
    <h4 :class="bem('fixtures-heading__date')">Data</h4>
</div>