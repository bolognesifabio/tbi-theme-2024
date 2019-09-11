<script>
    import data_model_mixin from '../mixins/data-model.vue'

    export default {
        mixins: [ data_model_mixin ],

        data() {
            return {
                autoplay: null
            }
        },

        mounted() {
            this.resume_autoplay()
        },

        computed: {
            is_browser_tab_active() {
                return this.$root.is_browser_tab_active
            }
        },

        watch: {
            is_browser_tab_active() {
                if (this.is_browser_tab_active && !this.autoplay) this.resume_autoplay()
                else if (!this.is_browser_tab_active && this.autoplay) this.stop_autoplay()
            }
        },

        methods: {
            stop_autoplay() {
                window.clearInterval(this.autoplay)
                this.autoplay = null
            },

            resume_autoplay() {
                if (this.autoplay) {
                    window.clearInterval(this.autoplay)
                    this.autoplay = null
                }
                
                this.autoplay = setInterval(() => {
                    const
                        ACTIVE_SLIDE_INDEX = this.model.findIndex(post => {
                            return post.is_active
                        }),
                        NEXT_SLIDE_INDEX = ACTIVE_SLIDE_INDEX >= this.model.length - 1 ? 0 : ACTIVE_SLIDE_INDEX + 1
                    
                    this.model[ACTIVE_SLIDE_INDEX].is_active = false
                    this.model[NEXT_SLIDE_INDEX].is_active = true
                }, 5000)
            },

            go_to_slide(post_id) {
                this.model = this.model.map(post => {
                    post.is_active = post.id === post_id
                    return post
                })
                
                this.stop_autoplay()
                this.resume_autoplay()
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../styles/constants';
    @import '../../styles/mixins';

    .slider {
        height: calc(100vh - 6.5rem);
        width: 100vw;
        position: relative;
        overflow: hidden;

        &__posts {
            @include gradient($color-primary-3, $color-red-3, bottom);
            display: flex;
            height: 100%;
            width: 100%;

            &__item {
                height: 100%;
                width: 100vw;
                padding-bottom: 12.5rem;
                position: relative;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                z-index: 1;

                &__img {
                    min-height: 100%;
                    min-width: 100%;
                    opacity: .5;
                    position: absolute;
                    top: 0;
                    left: 50%;
                    transform: translateX(-50%);
                    z-index: -1;
                }

                &__title {
                    font-size: 3.2rem;
                    font-weight: 900;
                    color: $color-fg-variant;
                    padding: 1.5rem 3rem;
                    margin: 0;
                    text-transform: uppercase;
                    text-align: center;
                }

                &__cta {
                    @include gradient($color-red-main, $color-fuchsia-main);
                    color: $color-fg-variant;
                    padding: 1.5rem 3rem;
                    font-weight: 600;
                    text-transform: uppercase;
                }
                
                &-enter-active,
                &-leave-active {
                    transition: all 1s ease-in-out;
                }
    
                &-enter,
                &-leave-to {
                    position: absolute;
                }

                &-enter {
                    transform: translateX(100%);
                }

                &-leave-to {
                    transform: translateX(-100%);
                }

                &-enter-active &,
                &-leave-active & {
                    &__title,
                    &__cta {
                        transition: all 1s ease-in-out;
                    }
                }

                &-enter & {
                    &__title,
                    &__cta {
                        opacity: 0;
                        transform: translateX(10rem);
                    }
                }

                &-leave-to & {
                    &__title,
                    &__cta {
                        opacity: 0;
                        transform: translateX(-10rem);
                    }
                }
            }
        }

        &__nav {
            position: absolute;
            display: flex;
            bottom: 6rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;

            &__item {
                margin: 0 .75rem;
                height: 1.8rem;
                width: 1.8rem;
                background: $color-fg-variant;
                border: .3rem solid $color-fg-variant;
                border-radius: 50%;
                transition: all .2s ease-in-out;

                &:hover {
                    background: $color-primary-8;
                }

                &--active,
                &--active:hover {
                    background: $color-red-main;
                }

                &__cta {
                    height: 100%;
                    width: 100%;
                }
            }
        }

        @include media-tablet {
            height: 50rem;

            &__posts {
                &__item {
                    padding-bottom: 0;
                    
                    &-enter {
                        transform: translateY(-100%) translateX(0);
                    }

                    &-leave-to {
                        transform: translateY(100%) translateX(0);
                    }

                    &-enter & {
                        &__title,
                        &__cta {
                            transform: translateY(-10rem) translateX(0);
                        }
                    }

                    &-leave-to & {
                        &__title,
                        &__cta {
                            transform: translateY(10rem) translateX(0);
                        }
                    }
                }
            }
        }

        @include media-desktop {
            &__posts {
                &__item {
                    &__title {
                        max-width: 80rem;
                    }
                }
            }
        }
    }
</style>