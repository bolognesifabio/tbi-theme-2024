export default {
    matching_teams() {
        return this.competition_teams.filter(competition_team => {
            return competition_team.competition_info.name.toLowerCase().indexOf(this.searched_team.toLowerCase()) >= 0
        })
    },

    competition_teams() {
        return this.$root.state.teams.filter(team => {
            return team.is_selected
        })
    }
}