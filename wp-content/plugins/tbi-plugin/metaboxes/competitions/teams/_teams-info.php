<?php
const INPUTS_NAME_PREFIX = 'tbi-metaboxes-competitions-teams-info-'; ?>

<tbi-competitions-teams-info inline-template>
    <div v-if="is_at_least_one_team_selected" :class="base_class">
        <h3 :class="get_bem('title')">Informazioni per questa competizione</h3>
        <table :class="get_bem('table')">
            <thead :class="get_bem('info__headings')">
                <tr>
                    <th :class="get_bem('info__headings__text')" colspan="2">Squadra</th>
                    <th :class="get_bem('info__headings__text')">Nome</th>
                    <th :class="get_bem('info__headings__text')">Nome breve</th>
                    <th :class="get_bem('info__headings__text')">Sigla</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="team in $root.state.teams" v-if="team.is_selected" :class="get_bem('info__team')">
                    <td :class="get_bem('info__team__emblem')">
                        <img :src="team.emblem" :class="get_bem('info__team__emblem__image')" />
                    </td>
                    <td :class="get_bem('info__team__title')">
                        <label>{{ team.title }}</label>
                    </td>
                    <td :class="get_bem('info__team__name')">
                        <input :name="'<?= INPUTS_NAME_PREFIX ?>name[' + team.id + ']'" type="text" v-model="team.competition_info.name" />
                    </td>
                    <td :class="get_bem('info__team__short-name')">
                        <input :name="'<?= INPUTS_NAME_PREFIX ?>short-name[' + team.id + ']'" type="text" v-model="team.competition_info.short_name" />
                    </td>
                    <td :class="get_bem('info__team__team-code')">
                        <input :name="'<?= INPUTS_NAME_PREFIX ?>team-code[' + team.id + ']'" type="text" v-model="team.competition_info.team_code" maxlength="3" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</tbi-competitions-teams-info>