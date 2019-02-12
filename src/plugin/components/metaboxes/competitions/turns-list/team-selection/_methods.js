export default {
    select_team(team) {
        this.$emit('input', team.id)
    },

    start_search() {
        this.is_active = true
    },

    end_search() {
        setTimeout(() => {
            let selected_team = this.competition_teams.find(team => { return team.id == this.value })
            this.searched_term = selected_team ? selected_team.title : ""
            this.is_active = false
        }, 200)
    }
}