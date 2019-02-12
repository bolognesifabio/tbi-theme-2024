export default function() {
    let selected_team = this.competition_teams.find(team => { return team.id == this.value })
    this.searched_term = selected_team ? selected_team.title : ""
}