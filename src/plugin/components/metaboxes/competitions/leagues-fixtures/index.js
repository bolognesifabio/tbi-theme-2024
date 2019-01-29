import Vue from 'vue'

import style from './style.scss'

export default {
    data() {
        return {
            dragged_fixture: {
                turn: null,
                fixture: null
            }
        }
    },

    beforeCreate() {
        Vue.set(this.$root.state, 'turns', [
            {
                name: 'First turn',
                fixtures: [
                    { name: 'AAA' },
                    { name: 'BBB' },
                    { name: 'CCC' }
                ]
            },
            {
                name: 'Second turn',
                fixtures: [
                    { name: 'DDD' },
                    { name: 'EEE' },
                    { name: 'FFF' }
                ]
            }
        ])
    },

    methods: {
        drop(turn_index, fixture_index) {
            let removed_fixture = this.$root.state.turns[this.dragged_fixture.turn].fixtures.splice(this.dragged_fixture.fixture, 1)[0]

            this.$root.state.turns[turn_index].fixtures.splice(fixture_index, 0, removed_fixture)
            this.dragged_fixture = {
                turn: null,
                fixture: null
            }
        },

        drag(turn_index, fixture_index) {
            this.dragged_fixture = {
                turn: turn_index,
                fixture: fixture_index
            }
        }
    },
    style
}