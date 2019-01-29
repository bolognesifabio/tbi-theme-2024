<?php ?>
<tbi-competitions-leagues-fixtures inline-template>
    <div>
        <div v-for="(turn, turn_index) in $root.state.turns" class="turn">
            <h2>{{ turn.name }}</h2>

            <ul>
                <li v-for="(fixture, fixture_index) in turn.fixtures" class="fixture">
                    <div draggable="true" @dragover.prevent @drop.prevent="drop(turn_index, fixture_index)" @dragstart="drag(turn_index, fixture_index)" class="draggable">{{ fixture_index }}. {{ fixture.name }}</div>
                </li>
                <li>
                    <div class="droppable" @drop.prevent="drop(turn_index, turn.fixtures.length)" @dragover.prevent>Droppable</div>
                </li>
            </ul>
        </div>
    </div>
</tbi-competitions-leagues-fixtures>