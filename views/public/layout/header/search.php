<tbi-search inline-template>
    <section class="search">
        <transition name="fade">
            <div class="search__layer" v-if="is_open"></div>
        </transition>

        <button class="search__toggle" @click.prevent="toggle">
            <tbi-icon :icon="is_open ? 'times' : 'search'" class="search__toggle__icon" />
        </button>

        <transition name="search">
            <form class="search__form" v-if="is_open">
            </form>
        </transition>
    </section>
</tbi-search>