export default {
    is_at_least_one_team_visible() {
        return this.$root.state.teams && this.$root.state.teams.filter(team => {
            return this.is_team_visible(team)
        }).length
    }
}