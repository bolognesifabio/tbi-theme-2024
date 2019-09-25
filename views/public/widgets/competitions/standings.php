<article class="standings" v-if="competition.are_standings_active || are_both_columns_visible">
    <h3 class="standings__title">Classifica</h3>

    <header class="standings__head">
        <div class="standings__head__position">Pos</div>
        <div class="standings__head__team">Squadra</div>
        <div class="standings__head__played">G</div>
        <div class="standings__head__points">Pt</div>
    </header>

    <div class="standings__row" v-for="(team, position) in competition.standings" :key="team.id">
        <div class="standings__row__position">{{ position + 1 }}</div>
        <div class="standings__row__team">
            <div class="standings__row__team__emblem">
                <img class="standings__row__team__emblem__img" :src="team.emblem" />
            </div>
            {{ team.title }}
        </div>
        <div class="standings__row__played">{{ team.played }}</div>
        <div class="standings__row__points">{{ team.points }}</div>
    </div>
</article>