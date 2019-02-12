export default {
    searched_term() {
        let matching_team = this.competition_teams.find(team => { return team.title === this.searched_term })
        if (matching_team) this.$emit('input', matching_team.id)
    }
}