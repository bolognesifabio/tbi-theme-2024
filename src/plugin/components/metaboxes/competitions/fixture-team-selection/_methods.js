export default {
    select_team(team) {
        this.$emit('input', team.id)
        this.searched_string = team.title
        this.is_active = false
    },

    start_search() {
        this.is_active = true
    },

    end_search() {
        setTimeout(() => {
            if (!this.has_search_exact_match) {
                const FALLBACK_TEAM = this.competition_teams.find(competition_team => {
                    return competition_team.id === this.value
                }) || null

                this.searched_string = FALLBACK_TEAM ? FALLBACK_TEAM.title : ""
            }

            this.is_active = false
        }, 200)
    }
}