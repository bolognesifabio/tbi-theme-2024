<template>
    <div>
        <h4 class="title">Filtri</h4>
        <div class="field">
            <input class="field__value" type="checkbox" v-model="$root.state.filters.are_inactive_hidden" />
            <label class="field__label">Mostra solo squadre attive</label>
        </div>

        <div class="field">
            <input class="field__value" type="checkbox" v-model="$root.state.filters.are_no_page_hidden" />
            <label class="field__label">Mostra solo squadre con una pagina</label>
        </div>

        <div class="field">
            <input class="field__value" type="checkbox" v-model="$root.state.filters.are_unselected_hidden" />
            <label class="field__label">Mostra solo squadre selezionate</label>
        </div>
    </diV>
</template>

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
    @import '../../../../style/utilities/mixins';

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