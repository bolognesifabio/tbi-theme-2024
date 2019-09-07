<script>
    import data_model_mixin from '../mixins/data-model.vue'

    export default {
        mixins: [ data_model_mixin ],

        mounted() {
            setInterval(() => {
                const
                    ACTIVE_SLIDE_INDEX = this.model.findIndex(post => {
                        return post.is_active
                    }),
                    NEXT_SLIDE_INDEX = ACTIVE_SLIDE_INDEX >= this.model.length - 1 ? 0 : ACTIVE_SLIDE_INDEX + 1
                
                this.model[ACTIVE_SLIDE_INDEX].is_active = false
                this.model[NEXT_SLIDE_INDEX].is_active = true
            }, 3000)
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
            height: calc(100vh - 6.5rem);
            width: 100%;

            &__item {
                height: calc(100vh - 6.5rem);
                width: 100vw;
                padding-bottom: 6rem;
                position: relative;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                z-index: 1;

                &__img {
                    height: 100%;
                    width: auto;
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
            }
        }
    }
</style>