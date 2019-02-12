export default function() {
    return {
        is_active: false,
        input_name: `tbi-competitions-turns[${this.turn_index}][fixtures][${this.index}][${this.is_home ? 'home' : 'away'}]`,
        // searched_term: ""
    }
}