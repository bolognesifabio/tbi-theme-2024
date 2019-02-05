export default function() {
    return {
        selected_team: null,
        searched_string: '',
        is_active: false,
        input_name: `tbi-league-fixtures[${this.turn_index}][fixtures][${this.fixture_index}][${this.is_home ? 'home' : 'away'}]`
    }
}