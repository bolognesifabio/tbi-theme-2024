export default /* html */ `
    <div>
        <ul>
            <li v-for="term in matching_terms">
                <button @click.prevent="select_term(term.key, term.name)">{{ term.name }}</button>
            </li>
        </ul>
        <input v-model="searched_term" @focusout="end_search" />
        <slot :output="output"></slot>
    </div>
`