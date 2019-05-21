export default /* html */ `
    <div v-if="is_league(slot_props.slide.type)" :class="slot_props.base_class + '__standings'">
        <h3 :class="slot_props.base_class + '__standings__title'">Classifica</h3>

        <table :class="slot_props.base_class + '__standings__table'" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th :class="slot_props.base_class + '__standings__table__position'">Pos</th>
                    <th :class="slot_props.base_class + '__standings__table__team'" colspan="2">Squadra</th>
                    <th :class="slot_props.base_class + '__standings__table__played'">G</th>
                    <th :class="slot_props.base_class + '__standings__table__results'">V</th>
                    <th :class="slot_props.base_class + '__standings__table__results'">S</th>
                    <th :class="slot_props.base_class + '__standings__table__results'">P</th>
                    <th :class="slot_props.base_class + '__standings__table__points'">Pt</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="(team, position) in slot_props.slide.teams">
                    <td :class="slot_props.base_class + '__standings__table__position'">{{ position + 1 }}</td>
                    <td :class="slot_props.base_class + '__standings__table__logo'">
                        <img :src="team.logo" />
                    </td>
                    <td :class="slot_props.base_class + '__standings__table__team'">{{ team.alias || team.title }}</td>
                    <td :class="slot_props.base_class + '__standings__table__played'">{{ team.stats.played }}</td>
                    <td :class="slot_props.base_class + '__standings__table__results'">{{ team.stats.wins }}</td>
                    <td :class="slot_props.base_class + '__standings__table__results'">{{ team.stats.loss }}</td>
                    <td :class="slot_props.base_class + '__standings__table__results'">{{ team.stats.draws }}</td>
                    <td :class="slot_props.base_class + '__standings__table__points'">{{ team.points }}</td>
                </tr>
            </tbody>
        </table>
    </div>
`