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

        <td :class="bem('list__item__fixtures__item__team', { home: true })">
            <tbi-fixture-team-selection
                v-model="fixture.teams.home.id"
                :input_name="'tbi-competition-turns[' + turn_index + '][fixtures][' + fixture_index + '][teams][home][id]'"
            ></tbi-fixture-team-selection>
        </td>

        <td :class="bem('list__item__fixtures__item__score', { home: true })">
            <input
                type="number"
                v-model="fixture.teams.home.score"
                :name="'tbi-competition-turns[' + turn_index + '][fixtures][' + fixture_index + '][teams][home][score]'"
            />
        </td>
        
        <td :class="bem('list__item__fixtures__item__separator')">-</td>
        
        <td :class="bem('list__item__fixtures__item__score', { away: true })">
            <input
                type="number"
                v-model="fixture.teams.away.score"
                :name="'tbi-competition-turns[' + turn_index + '][fixtures][' + fixture_index + '][teams][away][score]'"
            />
        </td>
        
        <td :class="bem('list__item__fixtures__item__team', { away: true })">
            <tbi-fixture-team-selection
                v-model="fixture.teams.away.id"
                :input_name="'tbi-competition-turns[' + turn_index + '][fixtures][' + fixture_index + '][teams][away][id]'"
            ></tbi-fixture-team-selection>
        </td>
        
        <td :class="bem('list__item__fixtures__item__place')">
            <input type="text" v-model="fixture.place" :name="'tbi-competition-turns[' + turn_index + '][fixtures][' + fixture_index + '][place]'" />
        </td>
        
        <td :class="bem('list__item__fixtures__item__date')">
            <input type="date" v-model="fixture.date" :name="'tbi-competition-turns[' + turn_index + '][fixtures][' + fixture_index + '][date]'" />
        </td>

        <td :class="bem('list__item__fixtures__item__delete')">
            <button :class="bem('list__item__fixtures__item__delete__button')" @click.prevent="remove_fixture(turn_index, fixture_index)"></button>
        </td>
    </tr>
`