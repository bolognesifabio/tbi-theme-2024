export default function() {
    return {
        is_active: false,
        input_name: `tbi-league-fixtures[${this.turn_index}][fixtures][${this.fixture_index}][${this.is_home ? 'home' : 'away'}]`
    }
}