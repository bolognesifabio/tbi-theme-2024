export default {
    selected_teams_terms() {
        return this.$root.state.teams
            .filter(team => {
                return team.is_selected
            }).map(team => {
            return {
                name: team.title,
                key: team.id
            }
        })
    }
}