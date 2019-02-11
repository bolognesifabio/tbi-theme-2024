<div
    :class="get_bem('heading')"
    @dragover="event => prevent_if_droppable(event)"
    @dragleave="remove_dragged_over_class"
    @drop.prevent="drop_turn"
>

    <div
        :class="get_bem('heading__drag-area')"
        @dragend="() => is_currently_dragged = false"
        @dragstart="update_turns_dragged_data"
        draggable="true"
    ></div>

    <input :class="get_bem('heading__input')" v-model="turn.name" />

    <button :class="get_bem('heading__button', 'delete')" @click.prevent="remove_turn()"></button>
    <button :class="get_bem('heading__button', 'add')" @click.prevent="add_fixture()">Aggiungi nuova partita</button>
</div>