export default {
    is_team_visible(team) {
        console.log(team.title, this.$root.state.are_inactive_visible, team.is_inactive)
        return !(this.$root.state.are_inactive_visible && team.is_inactive)
    }
}