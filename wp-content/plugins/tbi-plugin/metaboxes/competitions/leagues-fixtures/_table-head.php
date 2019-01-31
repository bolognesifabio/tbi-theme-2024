<thead>
    <tr>
        <th
            :class="get_bem('turn__title')"
            colspan="8"
            @dragover="event => check_if_droppable(event, 'turn')"
            @drop.prevent="drop_turn(turn_index)"
        >
            <span
                class="dashicons dashicons-menu"
                draggable="true"
                @dragstart="drag_turn(turn_index)"
            ></span>
            <div :class="get_bem('turn__title__drag-area')">
                
            </div>
            <input type="text" v-model="turn.name" :name="'tbi-league-fixtures[' + turn_index + '][name]'" />
        </th>
    </tr>
    <tr>
        <th colspan="2">Squadra in casa</th>
        <th colspan="2">Risultato</th>
        <th colspan="2">Squara in trasferta</th>
        <th>Localit&agrave;</th>
        <th>Data</th>
    </tr>
</thead>