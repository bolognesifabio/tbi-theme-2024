<tbi-header-search inline-template>
    <section class="search">
        <transition name="fade">
            <div class="search__layer" v-if="is_open"></div>
        </transition>

        <button class="search__toggle" @click.prevent="toggle">
            <tbi-icon :icon="is_open ? 'times' : 'search'" class="search__toggle__icon" />
        </button>

        <transition name="search__form">
            <form class="search__form" v-if="is_open" role="search" method="get" action="<?= home_url() ?>">
                <input class="search__form__input" type="text" value="" name="s" placeholder="Cerca..." ref="input" />
                <button class="search__form__button" type="submit" value="">
                    <tbi-icon class="search__form__button__icon" icon="search" class="icon" />
                </button>
            </form>
        </transition>
    </section>
</tbi-header-search>