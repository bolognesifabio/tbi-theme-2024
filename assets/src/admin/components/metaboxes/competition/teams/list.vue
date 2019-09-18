<script>
    import Vue from 'vue'
    
    export default {
        props: ['teams_input'],
        
        beforeMount() {
            Vue.set(this.$root.state, 'teams', this.teams_input)
        },

        computed: {
            is_at_least_one_team_visible: function() {
                return this.$root.state.teams && this.$root.state.teams.filter(team => {
                    return this.is_team_visible(team)
                }).length
            }
        },

        methods: {
            is_team_visible: function(team) {
                let { filters } = this.$root.state

                if (!filters) return false

                const
                    IS_VISIBLE_FOR_INACTIVE_STATUS = !(filters.are_inactive_hidden && team.is_inactive),
                    IS_VISIBLE_FOR_PAGE_STATUS = !(filters.are_no_page_hidden && team.is_hidden),
                    IS_VISIBLE_FOR_SELECT_STATUS = !(filters.are_unselected_hidden && !team.is_selected)

                return IS_VISIBLE_FOR_INACTIVE_STATUS && IS_VISIBLE_FOR_PAGE_STATUS && IS_VISIBLE_FOR_SELECT_STATUS
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../../style/constants';
    @import '../../../../style/mixins';

    .tbi-competition-teams-list {
        border-top: 1px solid $color-bg-main;
        margin-top: 15px;
    }

    .teams {
        display: flex;
        flex-wrap: wrap;
    
        &__item {
            $current-selector: &;
            position: relative;
            display: flex;
            align-items: center;
            flex-basis: 320px;
            padding-right: 15px;
    
            &__value[type=checkbox] {
                @include checkbox {
                    &:checked ~ {
                        #{$current-selector}__name {
                            color: $color-selected;
                        }
                    }
                }
            }
    
            &__emblem {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-basis: 30px;
                max-height: 24px;
                margin: 0 10px;
    
                &__image {
                    max-width: 30px;
                    max-height: 24px;
                }
            }
    
            &__name {
                color: #999;
                font-weight: 600;
            }
    
            &__checkbox-interface {
                position: relative;
                height: 16px;
                flex-basis: 16px;
                padding: 2px;
                box-sizing: border-box;
                border: 1px solid #999;
    
                &:before {
                    color: $color-bg-box;
                    display: none;
                    position: absolute;
                    height: 100%;
                    width: 100%;
                    top: -3px;
                    left: -4px;
                    opacity: .8;
                }
            }
        }
    }
</style>