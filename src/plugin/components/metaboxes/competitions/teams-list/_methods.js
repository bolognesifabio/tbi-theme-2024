export default {
    is_team_visible(team) {
        return !(this.$root.state.are_inactive_hidden && team.is_inactive) && !(this.$root.state.are_unselected_hidden && !team.is_selected)
    }
}