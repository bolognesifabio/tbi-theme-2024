export default /* html */ `
    <div
        draggable="true"
        :class="bem('list__item__header__draggable')"
        @dragstart="set_current_dragged_turn(turn_index, turn)"
        @dragend="reset_current_dragged_turn"
        @dragover="event => switch_turns(event, turn_index)"
    >
        <span class="dashicons dashicons-editor-justify"></span>
    </div>
`