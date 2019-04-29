export default /* html */ `
    <tr
        v-for="(fixture, fixture_index) in turn.fixtures"
        @dragover="event => switch_fixtures(event, turn_index, fixture_index)"
        :class="bem('list__item__fixtures__item')"
    >
        <td
            draggable="true"
            @dragstart="set_current_dragged_fixture(turn_index, fixture_index, fixture)"
            @dragend="reset_current_dragged_fixture"
            :class="bem('list__item__fixtures__item__draggable')"
        ></td>
        
        <td :class="bem('list__item__fixtures__item__logo', { home: true })">@</td>
        <td :class="bem('list__item__fixtures__item__team', { home: true })">
            <input type="text" v-model="fixture.teams.home.id" />
        </td>

        <td :class="bem('list__item__fixtures__item__score', { home: true })">
            <input type="number" v-model="fixture.teams.home.score" />
        </td>
        
        <td :class="bem('list__item__fixtures__item__separator')">-</td>
        
        <td :class="bem('list__item__fixtures__item__score', { away: true })">
            <input type="number" v-model="fixture.teams.away.score" />
        </td>
        
        <td :class="bem('list__item__fixtures__item__team', { away: true })">
            <input type="text" v-model="fixture.teams.away.id" />
        </td>
        
        <td :class="bem('list__item__fixtures__item__logo', { away: true })">@</td>
        <td :class="bem('list__item__fixtures__item__place')">
            <input type="text" v-model="fixture.place" />
        </td>
        <td :class="bem('list__item__fixtures__item__date')">
            <input type="text" v-model="fixture.date" />
        </td>
    </tr>
`