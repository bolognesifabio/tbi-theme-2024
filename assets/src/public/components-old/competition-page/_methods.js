export default {
    is_league(type) {
        return type === 'leagues'
    },

    team_from_id(team_id, teams) {
        return teams.find(team => {
            return team.id == team_id
        })
    }
}