import Vue from 'vue'

export default function() {
    Vue.set(this.$root.state, 'turns', this.turns_input)

    this.$root.state.turns = [
        { name: "Giornata 1" },
        { name: "Giornata 2" },
        { name: "Giornata 3" },
        { name: "Giornata 4" },
        { name: "Giornata 5" },
        { name: "Giornata 6" }
    ]
}