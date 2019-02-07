export default /* html */ `
    <div>
        <div
            draggable="true"
            @dragover="event => prevent_if_droppable(event)"
            @drop.prevent="drop_turn()"
            @dragstart="update_turns_dragged_data()"
        >
            <slot name="draggable-area"></slot>
        </div>

        <button @click.prevent="remove_turn()">
            <slot name="remove-turn-button"></slot>
        </button>

        <button @click.prevent="add_fixture()">
            <slot name="add-fixture-button"></slot>
        </button>

        <slot></slot>
    </div>
`