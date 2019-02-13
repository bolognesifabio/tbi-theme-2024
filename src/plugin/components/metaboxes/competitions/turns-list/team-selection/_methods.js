export default {
    select_team(team) {
        this.$emit('input', team.id)
    },

    start_search() {
        this.is_active = true
    },

    end_search() {
        setTimeout(() => {
            this.refresh_searched_team()
            this.is_active = false
        }, 200)
    },
    
    refresh_searched_team() {
        let selected_team = this.competition_teams.find(team => { return team.id == this.value })
        this.searched_team = selected_team ? selected_team.title : ""
    }
}