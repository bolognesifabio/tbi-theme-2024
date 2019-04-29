export default /* html */ `
    <div v-if="is_at_least_one_team_selected" :class="bem_base">
        <h4 v-if="is_at_least_one_team_selected" :class="bem('title')">Informazioni delle squadre per la competizione</h4>
        
        <div v-if="is_at_least_one_team_selected" :class="bem('scroll-container')">
            <table :class="bem('scroll-container__table')" cellspacing="0">
                <thead :class="bem('scroll-container__table__headings')">
                    <tr>
                        <th :class="bem('scroll-container__table__headings__text')" colspan="2">Squadra</th>
                        <th :class="bem('scroll-container__table__headings__text')">Nome</th>
                        <th :class="bem('scroll-container__table__headings__text')">Nome breve</th>
                        <th :class="bem('scroll-container__table__headings__text', { 'narrow': true })">Sigla</th>
                        <th :class="bem('scroll-container__table__headings__text', { 'narrow': true })">Penalit&agrave;</th>
                        <th :class="bem('scroll-container__table__headings__text', { 'narrow': true })">Priorit&agrave;</th>
                        <th :class="bem('scroll-container__table__headings__text', { 'narrow': true, 'is-not-in-standings': true })"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="team in $root.state.teams" v-if="team.is_selected" :class="bem('scroll-container__table__team')">
                        <th :class="bem('scroll-container__table__team__emblem')">
                            <img :src="team.emblem" :class="bem('scroll-container__table__team__emblem__image')" />
                        </th>
                        <th :class="bem('scroll-container__table__team__title')">{{ team.title }}</th>
                        <td :class="bem('scroll-container__table__team__input')">
                            <input :name="'tbi-competition-teams-info-name[' + team.id + ']'" type="text" v-model="team.competition_info.name" />
                        </td>
                        <td :class="bem('scroll-container__table__team__input')">
                            <input :name="'tbi-competition-teams-info-short-name[' + team.id + ']'" type="text" v-model="team.competition_info.short_name" />
                        </td>
                        <td :class="bem('scroll-container__table__team__input', { 'narrow': true })">
                            <input :name="'tbi-competition-teams-info-code[' + team.id + ']'" type="text" v-model="team.competition_info.code" maxlength="3" />
                        </td>
                        <td :class="bem('scroll-container__table__team__input', { 'narrow': true })">
                            <input :name="'tbi-competition-teams-info-penalty[' + team.id + ']'" type="number" v-model="team.competition_info.penalty" min="0" max="99" />
                        </td>
                        <td :class="bem('scroll-container__table__team__input', { 'narrow': true })">
                            <input :name="'tbi-competition-teams-info-priority[' + team.id + ']'" type="number" v-model="team.competition_info.priority" min="0" max="99" />
                        </td>
                        <td :class="bem('scroll-container__table__team__input', { 'narrow': true, 'is-not-in-standings': true })">
                            <input :name="'tbi-competition-teams-info-is-not-in-standings[' + team.id + ']'" type="checkbox" v-model="team.competition_info.is_not_in_standings" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
`