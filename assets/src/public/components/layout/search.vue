<script>
    export default {
        data() {
            return {
                is_open: false
            }
        },

        methods: {
            toggle() {
                this.is_open = !this.is_open
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../styles/constants';
    @import '../../styles/mixins';

    .search {
        height: 6rem;
        width: 6rem;
        padding: .75rem 0;

        &__toggle {
            color: $color-primary-lightest;
            height: 100%;
            width: 100%;
            font-size: 1.8rem;
            grid-row: 1;
            grid-column: 3;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        &__layer {
            @include gradient($color-green-main, $color-violet-main, bottom);
            position: absolute;
            top: 6.5rem;
            left: 0;
            width: 100vw;
            height: calc(100vh - 6.5rem);
            z-index: -1;
            opacity: .9;

            &.fade-enter,
            &.fade-leave-to {
                opacity: 0;
            }
        }

        &__form {
            position: absolute;
            width: 100vw;
            height: 6rem;
            top: 6.5rem;
            left: 0;
            background: $color-neutral-lightest;

            &.search-enter-active {
                transition: all .3s ease-out;
            }

            &.search-leave-active {
                transition: all .3s ease-in;
            }

            &.search-enter {
                opacity: 0;
                height: 0;
            }

            &.search-leave-to {
                opacity: 0;
                height: 0;
            }
        }

        @include media-desktop {
            grid-row: 2;
            grid-column: 3;
            background: $color-primary-main;
        }
    }
</style>