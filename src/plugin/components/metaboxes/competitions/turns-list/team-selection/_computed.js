export default {
    matching_teams() {
        return this.competition_teams.filter(competition_team => {
            return competition_team.title.toLowerCase().indexOf(this.searched_term.toLowerCase()) >= 0
        })
    },

    competition_teams() {
        return this.$root.state.teams.filter(team => {
            return team.is_selected
        })
    }
}