export default {
    select_team(team) {
        this.$emit('input', team.id)
    },

    start_search() {
        this.is_active = true
    },

    end_search() {
        setTimeout(() => {
            this.$forceUpdate()
            this.is_active = false
        }, 200)
    }
}