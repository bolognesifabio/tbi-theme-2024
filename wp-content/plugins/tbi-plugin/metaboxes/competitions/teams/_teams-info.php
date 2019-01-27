<?php
const INPUTS_NAME_PREFIX = 'tbi-metaboxes-competitions-teams-info-'; ?>

<tbi-competitions-teams-info inline-template>
    <div v-if="is_at_least_one_team_selected" :class="base_class">
        <h3 :class="get_bem('title')">Informazioni per questa competizione</h3>
        <ul :class="get_bem('info')">
            <li :class="get_bem('info__headings')">
                <h4 :class="get_bem('info__headings__team')">Squadra</h4>
                <h4 :class="get_bem('info__headings__name')">Nome</h4>
                <h4 :class="get_bem('info__headings__short-name')">Nome breve</h4>
                <h4 :class="get_bem('info__headings__team-code')">Sigla</h4>
            </li>
            <li v-for="team in $root.state.teams" v-if="team.is_selected" :class="get_bem('info__team')">
                <div :class="get_bem('info__team__emblem')">
                    <img :src="team.emblem" :class="get_bem('info__team__emblem__image')" />
                </div>
                <label :class="get_bem('info__team__title')">{{ team.title }}</label>
                <input :name="'<?= INPUTS_NAME_PREFIX ?>name[' + team.id + ']'" :class="get_bem('info__team__name')" type="text" v-model="team.competition_info.name" />
                <input :name="'<?= INPUTS_NAME_PREFIX ?>short-name[' + team.id + ']'" :class="get_bem('info__team__short-name')" type="text" v-model="team.competition_info.short_name" />
                <input :name="'<?= INPUTS_NAME_PREFIX ?>team-code[' + team.id + ']'" :class="get_bem('info__team__team-code')" type="text" v-model="team.competition_info.team_code" maxlength="3" />
            </li>
        </ul>
    </div>
</tbi-competitions-teams-info>