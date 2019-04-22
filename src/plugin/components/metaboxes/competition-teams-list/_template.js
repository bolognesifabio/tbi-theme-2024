export default /* html */ `
    <div :class="bem_base">
        <h4 :class="bem('title')">Squadre partecipanti</h4>
        <ul :class="bem('teams')">
            <li v-for="team in $root.state.teams" v-if="is_team_visible(team)" :class="bem('teams__item')" @click="() => team.is_selected = !team.is_selected">
                <input
                    v-model="team.is_selected"
                    type="checkbox"
                    :class="bem('teams__item__value')"
                    :name="'tbi-competition-teams-participants[' + team.id + ']'"
                    :value="team.id"
                />

                <div :class="bem('teams__item__emblem')">
                    <img :class="bem('teams__item__emblem__image')" :src="team.emblem" />
                </div>

                <label :class="bem('teams__item__name')">{{ team.title }}</label>
            </li>
            <li v-if="!is_at_least_one_team_visible">Nessun team visibile. Prova a disattivare i filtri.</li>
        </ul>
    </div>
`