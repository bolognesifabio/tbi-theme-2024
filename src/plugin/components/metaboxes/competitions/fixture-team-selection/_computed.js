export default {
    matching_teams() {
        return this.competition_teams.filter(competition_team => {
            return competition_team.title.toLowerCase().indexOf(this.searched_string.toLowerCase()) >= 0
        })
    },

    has_search_exact_match() {
        return this.competition_teams.find(competition_team => {
            return competition_team.title.toLowerCase() === this.searched_string.toLowerCase()
        })
    }
}