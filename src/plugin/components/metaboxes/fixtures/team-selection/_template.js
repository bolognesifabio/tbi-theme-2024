export default /* html */ `
    <div :class="bem_base">
        <ul v-if="is_active" :class="bem('suggestions')">
            <li
                v-for="matching_team in matching_teams"
                :class="bem('suggestions__team')"
                @click.prevent="select_team(matching_team)"
            >{{ matching_team.title }}</li>
        </ul>
        <input
            :class="bem('search-field')"
            v-model="searched_team"
            type="text"
            @focusin="start_search"
            @focusout="end_search"
        />
        <input
            :class="bem('selected-team')"
            :name="input_name"
            type="text"
            v-model="value"
        />
    </div>
`