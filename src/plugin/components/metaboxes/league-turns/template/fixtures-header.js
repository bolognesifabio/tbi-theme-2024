export default /* html */ `
    <tr>
        <th></th>
        <th :class="bem('list__item__fixtures__header__team', { home: true })">Squadra in casa</th>
        <th colspan="3" :class="bem('list__item__fixtures__header__score')">Risultato</th>
        <th :class="bem('list__item__fixtures__header__team', { away: true })">Squadra in trasferta</th>
        <th :class="bem('list__item__fixtures__header__place')">Luogo</th>
        <th :class="bem('list__item__fixtures__header__date')">Data</th>
        <th></th>
    </tr>
`