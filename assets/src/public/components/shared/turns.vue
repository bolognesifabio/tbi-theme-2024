<script>
    export default {
        props: {
            turns: {
                type: [Array, Object],
                default: []
            },

            teams: {
                type: [Array, Object],
                default: {}
            },

            is_cup: {
                type: Boolean,
                default: false
            }
        },

        data() {
            return {
                selected_turn_index: 0
            }
        },

        beforeMount() {
            this.selected_turn_index = this.turns.findIndex(turn => {
                return turn.is_active
            }) || 0
        },

        computed: {
            has_multiple_turns() {
                return this.turns.length > 1
            },

            selected_turn() {
                return this.turns[this.selected_turn_index]
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../styles/constants.scss';
    @import '../../styles/mixins.scss';

    
</style>