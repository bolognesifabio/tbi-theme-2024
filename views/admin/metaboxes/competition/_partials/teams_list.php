<tbi-competition-teams-list :teams_input='<?= $teams ?>' inline-template>
    <div :class="bem_base">
        <h4 class="title">Squadre partecipanti</h4>
        <ul class="teams">
            <li v-for="team in $root.state.teams" v-if="is_team_visible(team)" class="teams__item" @click="() => team.is_selected = !team.is_selected">
                <input
                    v-model="team.is_selected"
                    type="checkbox"
                    :class="bem('teams__item__value')"
                    :name="'tbi-competition-teams[' + team.id + ']'"
                    :value="team.id"
                />

                <div class="teams__item__emblem">
                    <img class="teams__item__emblem__image" :src="team.emblem" />
                </div>

                <label class="teams__item__name">{{ team.title }}</label>
            </li>
            <li v-if="!is_at_least_one_team_visible">Nessun team visibile. Prova a disattivare i filtri.</li>
        </ul>
    </div>
</tbi-competition-teams-list> 