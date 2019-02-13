<div :class="get_bem('fixtures-list')">
    <tbi-competitions-fixture inline-template
        v-for="(fixture, fixture_index) in turn.fixtures"
        :fixture="fixture"
        :index="fixture_index"
        :turn_index="index"
        :key="fixture_index"
    >
        <div
            :class="base_class" 
            @dragover="event => prevent_if_droppable(event)"
            @drop.prevent="drop_fixture"
        >
            <div
                :class="get_bem('drag-area')"
                @dragstart="update_turns_dragged_data"
                draggable="true"
            ></div>

            <tbi-fixture-team-selection
                v-model="fixture.home.team"
                :index="index"
                :turn_index="turn_index"
                :is_home="true"
            ></tbi-fixture-team-selection>

            <input
                type="number"
                v-model="fixture.home.score"
                :class="get_bem('score')"
                :name="'tbi-competitions-turns[' + turn_index + '][fixtures][' + index + '][home][score]'"
            />

            <input
                type="number"
                v-model="fixture.away.score"
                :class="get_bem('score')"
                :name="'tbi-competitions-turns[' + turn_index + '][fixtures][' + index + '][away][score]'"
            />
            
            <tbi-fixture-team-selection
                v-model="fixture.away.team"
                :index="index"
                :turn_index="turn_index"
                :is_home="false"
            ></tbi-fixture-team-selection>
            
            <input
                v-model="fixture.place"
                type="text"
                :class="get_bem('place')"
                :name="'tbi-competitions-turns[' + turn_index + '][fixtures][' + index + '][place]'"
            />

            <input
                v-model="fixture.date"
                :class="get_bem('date')"
                type="date"
                :name="'tbi-competitions-turns[' + turn_index + '][fixtures][' + index + '][date]'"
            />

            <button
                :class="get_bem('delete')"
                @click.prevent="remove_fixture"
            ></button>
        </div>
    </tbi-competitions-fixture>
</div>