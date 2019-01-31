export default {
    output() {
        return this.terms.find(term => {
            return term.key === this.selected_key
        }) || null
    },

    matching_terms() {
        return this.terms.filter(term => {
            return term.name.toLowerCase().indexOf(this.searched_term.toLowerCase()) >= 0
        })
    },

    has_search_exact_match() {
        return this.terms.find(term => {
            return term.name.toLowerCase() === this.searched_term.toLowerCase()
        })
    }
}