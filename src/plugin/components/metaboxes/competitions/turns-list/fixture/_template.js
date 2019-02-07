export default /* html */ `
    <div
        draggable="true"
        @dragover="event => prevent_if_droppable(event)"
        @drop.prevent="drop_fixture()"
        @dragstart="update_turns_dragged_data()"
    >
        <slot></slot>
    </div>
`