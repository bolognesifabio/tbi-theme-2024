<div :class="get_bem('turn__heading')">
    <h4
        :class="get_bem('turn__heading__drag-area')"
        @dragover="event => prevent_if_droppable(event)"
        @drop.prevent="drop_turn()"
        @dragstart="update_turns_dragged_data()"
        draggable="true"
    >{{ turn.name }}</h4>

    <input :class="get_bem('turn__heading__input')" v-model="turn.name" />

    <button :class="get_bem('turn__heading__button', 'delete')" @click.prevent="remove_turn()">X</button>
    <button :class="get_bem('turn__heading__button', 'add')" @click.prevent="add_fixture()">Aggiungi nuova partita</button>
</div>