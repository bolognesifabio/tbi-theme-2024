<tbi-competitions-teams-list inline-template :teams_input='<?= htmlspecialchars(json_encode($all_teams), ENT_QUOTES) ?>'>
    <ul :class="bem_base">
        <li v-for="team in $root.state.teams" v-if="is_team_visible(team)" :class="bem('item')">
            <input
                v-model="team.is_selected"
                type="checkbox"
                :class="bem('item__checkbox')"
                :name="'tbi-metaboxes-competitions-teams-participants[' + team.id + ']'"
                :value="team.id"
            />
            <div :class="[bem('item__checkbox-interface'), 'dashicons', 'dashicons-yes']"></div>
            <div :class="bem('item__emblem')">
                <img :class="bem('item__emblem__image')" :src="team.emblem" />
            </div>
            <label :class="bem('item__name')">{{ team.title }}</label>
        </li>
        <li v-if="!is_at_least_one_team_visible">Nessun team visibile. Prova a disattivare i filtri.</li>
    </ul>
</tbi-competitions-teams-list>