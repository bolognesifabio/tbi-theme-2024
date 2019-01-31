export default {
    select_term(key, name) {
        this.selected_key = key
        this.searched_term = name
        this.is_active = false
    },

    start_search() {
        this.is_active = true
    },

    end_search() {
        setTimeout(() => {
            if (!this.has_search_exact_match) {
                const CURRENT_KEY = this.terms.find(term => {
                    return term.key === this.selected_key
                }) || null
                this.searched_term = CURRENT_KEY ? CURRENT_KEY.name : ''
            }

            this.is_active = false
        }, 200)
    }
}