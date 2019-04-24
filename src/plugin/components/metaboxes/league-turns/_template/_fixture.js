export default /* html */ `
    <tr
        v-for="(fixture, fixture_index) in turn.fixtures"
        @dragover="event => switch_fixtures(event, turn_index, fixture_index)"
    >
        <td>
            <div
                draggable="true"
                @dragstart="set_current_dragged_fixture(turn_index, fixture_index, fixture)"
                @dragend="reset_current_dragged_fixture"
            >X</div>
            {{ fixture }}
        </td>
    </tr>
`