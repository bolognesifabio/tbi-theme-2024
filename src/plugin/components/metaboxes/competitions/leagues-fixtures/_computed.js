export default {
    competition_teams() {
        return this.$root.state.teams.filter(team => {
            return team.is_selected
        })
    }
}