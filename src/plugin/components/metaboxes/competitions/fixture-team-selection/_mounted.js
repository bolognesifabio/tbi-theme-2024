export default function() {
    console.groupCollapsed(this.turn_index, this.fixture_index)
    console.log(this.value)
    console.groupEnd()
    this.end_search()
}