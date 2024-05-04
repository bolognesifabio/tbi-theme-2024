<article class="standings">
    <h3 class="standings__title">Classifica</h3>

    <header class="standings__head">
        <div class="standings__head__cell">Pos</div>
        <div class="standings__head__cell standings__head__cell--team">Squadra</div>
        <div class="standings__head__cell standings__head__cell--details">V</div>
        <div class="standings__head__cell standings__head__cell--details">S</div>
        <div class="standings__head__cell standings__head__cell--details">P</div>
        <div class="standings__head__cell">G</div>
        <div class="standings__head__cell standings__head__cell--points">Pt</div>
    </header>
    
    <div class="standings__row" v-for="(team, position) in competition.standings" :key="team.id">
        <div class="standings__row__cell standings__row__cell--position">{{ position + 1 }}</div>
        <div class="standings__row__cell standings__row__cell--team">
            <div class="team__emblem">
                <img class="team__emblem__img" :src="team.emblem" />
            </div>
            <span class="team__name team__name--full">{{ team.title }}</span>
            <span class="team__name team__name--short">{{ team.short_name }}</span>
        </div>
        <div class="standings__row__cell standings__row__cell--details">{{ team.won }}</div>
        <div class="standings__row__cell standings__row__cell--details">{{ team.loss }}</div>
        <div class="standings__row__cell standings__row__cell--details">{{ team.draw }}</div>
        <div class="standings__row__cell">{{ team.played }}</div>
        <div class="standings__row__cell standings__row__cell--points">{{ team.points }}</div>
    </div>
</article>