<tbi-teams-list inline-template :teams_input='<?= htmlspecialchars(json_encode($all_teams), ENT_QUOTES) ?>'>
    <ul class="competitions-metaboxes__teams__participants">
        <li v-for="team in teams" v-if="is_team_visible(team)" class="competitions-metaboxes__teams__participants__item">
            <input
                v-model="team.is_selected"
                class="competitions-metaboxes__teams__participants__item__checkbox"
                type="checkbox"
                :name="'tbi-metaboxes-competitions-teams-participants[' + team.id + ']'"
                :value="team.id"
            />
            <div class="competitions-metaboxes__teams__participants__item__checkbox-interface dashicons dashicons-yes"></div>
            <div class="competitions-metaboxes__teams__participants__item__emblem">
                <img class="competitions-metaboxes__teams__participants__item__emblem__image" :src="team.emblem" />
            </div>
            <label class="competitions-metaboxes__teams__participants__item__name">{{ team.title }}</label>
        </li>
    </ul>
</tbi-teams-list>