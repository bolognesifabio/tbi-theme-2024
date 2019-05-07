export default {
    is_team_visible(team) {
        let { filters } = this.$root.state

        if (!filters) return false

        const
            IS_VISIBLE_FOR_INACTIVE_STATUS = !(filters.are_inactive_hidden && team.is_inactive),
            IS_VISIBLE_FOR_PAGE_STATUS = !(filters.are_no_page_hidden && team.is_hidden),
            IS_VISIBLE_FOR_SELECT_STATUS = !(filters.are_unselected_hidden && !team.is_selected)

        return IS_VISIBLE_FOR_INACTIVE_STATUS && IS_VISIBLE_FOR_PAGE_STATUS && IS_VISIBLE_FOR_SELECT_STATUS
    }
}