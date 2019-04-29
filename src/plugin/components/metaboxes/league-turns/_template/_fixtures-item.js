export default /* html */ `
    <tr
        v-for="(fixture, fixture_index) in turn.fixtures"
        @dragover="event => switch_fixtures(event, turn_index, fixture_index)"
    >
        <td
            draggable="true"
            @dragstart="set_current_dragged_fixture(turn_index, fixture_index, fixture)"
            @dragend="reset_current_dragged_fixture"
        >X</td>
        <td>@</td>
        <td>HOME TEAM</td>
        <td>20</td>
        <td>-</td>
        <td>30</td>
        <td>AWAY TEAM</td>
        <td>@</td>
        <td>City</td>
        <td>2019-04-29</td>
    </tr>
`