export default {
    is_at_least_one_team_selected() {
        return this.$root.state.teams && this.$root.state.teams.filter(team => {
            return team.is_selected
        }).length
    }
}