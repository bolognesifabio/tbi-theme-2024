<div :class="get_bem('heading')">
    <h4
        :class="get_bem('heading__drag-area')"
        @dragover="event => prevent_if_droppable(event)"
        @dragleave="remove_dragged_over_class"
        @drop.prevent="drop_turn"
        @dragend="() => is_currently_dragged = false"
        @dragstart="update_turns_dragged_data"
        draggable="true"
    >{{ turn.name }}</h4>

    <input :class="get_bem('heading__input')" v-model="turn.name" />

    <button :class="get_bem('heading__button', 'delete')" @click.prevent="remove_turn()">X</button>
    <button :class="get_bem('heading__button', 'add')" @click.prevent="add_fixture()">Aggiungi nuova partita</button>
</div>