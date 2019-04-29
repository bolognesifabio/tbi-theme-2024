export default /* html */ `
    <div
        v-if="current_dragged_turn"
        :class="bem('list__item__droppable')"
        @dragover="event => switch_turns(event, turn_index)"
    ></div>
    
    <div
        v-if="current_dragged_fixture && !turn.is_open"
        :class="bem('list__item__droppable', { fixtures: true })"
        @drop="event => switch_fixtures(event, turn_index, turn.fixtures.length)"
        @dragover.prevent
    ></div>
`