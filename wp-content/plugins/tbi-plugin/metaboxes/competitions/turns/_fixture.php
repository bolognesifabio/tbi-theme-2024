<tr
    v-for="(fixture, fixture_index) in turn.fixtures"
    :class="[get_bem('turn__fixtures__element'), { 'dragged': is_dragged_object(turn_index, fixture_index) }]"
    @dragover="event => check_if_droppable(event, 'fixture')"
    @drop.prevent="drop_fixture(turn_index, fixture_index)"
>
    <td
        :class="get_bem('turn__fixtures__element__drag-area')"
        draggable="true"
        @dragstart="drag_fixture(turn_index, fixture_index)" 
    >{{turn_index}} - {{ fixture_index }}</td>
    <td>@</td>
    <td>
        <tbi-fixture-team-selection :competition_teams="competition_teams" v-model="fixture.home" :fixture_index="fixture_index" :turn_index="turn_index" :is_home="true"></tbi-fixture-team-selection>
    </td>
    <td>0</td>
    <td>-</td>
    <td>0</td>
    <td>
        <tbi-fixture-team-selection :competition_teams="competition_teams" v-model="fixture.away" :fixture_index="fixture_index" :turn_index="turn_index" :is_home="false"></tbi-fixture-team-selection>
    </td>
    <td>@</td>
    <td>Maddaloni</td>
    <td>31/08/1989</td>
    <td>C</td>
</tr>