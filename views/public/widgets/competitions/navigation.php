<nav class="nav">
    <button
        v-if="loaded_competitions.length > 1"
        class="nav__cta"
        @click.prevent="prev_slide()"
    >
        <tbi-icon icon="caret-left"></tbi-icon>
    </button>
    
    <transition-group
        tag="ul"
        class="nav__competitions"
        :name="slide"
    >
        <li
            class="nav__competitions__item"
            v-for="competition in loaded_competitions"
            :key="competition.id"
            v-show="competition.is_active"
        >
            <h3 class="nav__competitions__item__title">{{ competition.competition.name }}</h3>
            <h4 class="nav__competitions__item__subtitle">{{ competition.title }}</h4>
        </li>
    </transition-group>

    <button
        v-if="loaded_competitions.length > 1"
        class="nav__cta"
        @click.prevent="next_slide()"
    >
        <tbi-icon icon="caret-right"></tbi-icon>
    </button>
</nav>