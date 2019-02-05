<div :class="get_bem('turn__heading')">
    <h4
        :class="get_bem('turn__heading__drag-area')"
        draggable="true"
        @dragover="event => check_if_droppable(event, 'turn')"
        @drop.prevent="drop_turn(turn_index)"
        @dragstart="drag_turn(turn_index)"
    >{{ turn.name }}</h4>
    <input :class="get_bem('turn__heading__input')" v-model="turn.name" />
</div>