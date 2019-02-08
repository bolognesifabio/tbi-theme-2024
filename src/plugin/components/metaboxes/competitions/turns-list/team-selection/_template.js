export default /* html */ `
    <div :class="base_class">
        <ul v-if="is_active" :class="get_bem('suggestions')">
            <li
                v-for="matching_team in matching_teams"
                :class="get_bem('suggestions__team')"
                @click.prevent="select_team(matching_team)"
            >{{ matching_team.title }}</li>
        </ul>
        <input
            v-model="searched_term"
            type="text"
            @focusin="start_search"
            @focusout="end_search"
        />
        <input
            type="text"
            v-model="value"
        />
    </div>
`