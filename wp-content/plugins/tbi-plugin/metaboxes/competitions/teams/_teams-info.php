<?php
const INPUTS_NAME_PREFIX = 'tbi-metaboxes-competitions-teams-info-'; ?>

<tbi-competitions-teams-info inline-template>
    <div v-if="is_at_least_one_team_selected" :class="base_class">
        <h3 :class="get_bem('title')">Informazioni per questa competizione</h3>
        <div v-if="is_at_least_one_team_selected" :class="get_bem('scroll-container')">
            <table :class="get_bem('scroll-container__table')">
                <thead :class="get_bem('scroll-container__table__headings')">
                    <tr>
                        <th :class="get_bem('scroll-container__table__headings__text')" colspan="2">Squadra</th>
                        <th :class="get_bem('scroll-container__table__headings__text')">Nome</th>
                        <th :class="get_bem('scroll-container__table__headings__text')">Nome breve</th>
                        <th :class="get_bem('scroll-container__table__headings__text') + ' narrow'">Sigla</th>
                        <th :class="get_bem('scroll-container__table__headings__text') + ' narrow'">Penalit&agrave;</th>
                        <th :class="get_bem('scroll-container__table__headings__text') + ' narrow'">Priorit&agrave;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="team in $root.state.teams" v-if="team.is_selected" :class="get_bem('scroll-container__table__team')">
                        <th :class="get_bem('scroll-container__table__team__emblem')">
                            <img :src="team.emblem" :class="get_bem('scroll-container__table__team__emblem__image')" />
                        </th>
                        <th :class="get_bem('scroll-container__table__team__title')">{{ team.title }}</th>
                        <td :class="get_bem('scroll-container__table__team__input')">
                            <input :name="'<?= INPUTS_NAME_PREFIX ?>name[' + team.id + ']'" type="text" v-model="team.competition_info.name" />
                        </td>
                        <td :class="get_bem('scroll-container__table__team__input')">
                            <input :name="'<?= INPUTS_NAME_PREFIX ?>short-name[' + team.id + ']'" type="text" v-model="team.competition_info.short_name" />
                        </td>
                        <td :class="get_bem('scroll-container__table__team__input') + ' narrow'">
                            <input :name="'<?= INPUTS_NAME_PREFIX ?>team-code[' + team.id + ']'" type="text" v-model="team.competition_info.team_code" maxlength="3" />
                        </td>
                        <td :class="get_bem('scroll-container__table__team__input') + ' narrow'">
                            <input :name="'<?= INPUTS_NAME_PREFIX ?>penalty[' + team.id + ']'" type="text" v-model="team.competition_info.penalty" maxlength="3" />
                        </td>
                        <td :class="get_bem('scroll-container__table__team__input') + ' narrow'">
                            <input :name="'<?= INPUTS_NAME_PREFIX ?>priority[' + team.id + ']'" type="text" v-model="team.competition_info.priority" maxlength="3" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</tbi-competitions-teams-info>