<script>
    import Vue from 'vue'
    
    export default {
        beforeCreate() {
            Vue.set(this.$root.state, 'filters', {
                are_inactive_hidden: true,
                are_no_page_hidden: true,
                are_unselected_hidden: false
            })
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../../style/mixins';

    .field {
        display: flex;
        align-items: center;
        height: 24px;

        &__value {
            @include checkbox {
                margin-right: 5px;
            }
        }

        &__label {
            cursor: default;
        }
    }
</style>