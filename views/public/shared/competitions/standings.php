<article class="standings">
    <h3 class="standings__title">Classifica</h3>

    <header class="standings__head">
        <div class="standings__head__cell">Pos</div>
        <div class="standings__head__cell standings__head__cell--team">Squadra</div>
        <div class="standings__head__cell">V</div>
        <div class="standings__head__cell">S</div>
        <div class="standings__head__cell">P</div>
        <div class="standings__head__cell">G</div>
        <div class="standings__head__cell standings__head__cell--points">Pt</div>
    </header>

    <div class="standings__row" v-for="(team, position) in competition.standings" :key="team.id">
        <div class="standings__row__cell standings__row__cell--position">{{ position + 1 }}</div>
        <div class="standings__row__cell standings__row__cell--team">
            <div class="standings__row__cell__emblem">
                <img class="standings__row__cell__emblem__img" :src="team.emblem" />
            </div>
            {{ team.title }}
        </div>
        <div class="standings__head__cell">{{ team.played }}</div>
        <div class="standings__head__cell">{{ team.won }}</div>
        <div class="standings__head__cell">{{ team.loss }}</div>
        <div class="standings__head__cell">{{ team.draw }}</div>
        <div class="standings__head__cell standings__head__cell--points">{{ team.points }}</div>
    </div>
</article>