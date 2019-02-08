export default {
    matching_teams() {
        return this.competition_teams.filter(competition_team => {
            return competition_team.title.toLowerCase().indexOf(this.searched_term.toLowerCase()) >= 0
        })
    },

    searched_term: {
        get() {
            let selected_team = this.competition_teams.find(team => { return team.id === this.value })
            return selected_team ? selected_team.title : ""
        },

        set(searched_term) {
            let matching_team = this.competition_teams.find(team => { return team.title === searched_term })
            if (matching_team) this.$emit('input', matching_team.id)
        }
    },

    competition_teams() {
        return this.$root.state.teams.filter(team => {
            return team.is_selected
        })
    }
}