export default /* html */ `
    <div :class="base_class">
        <ul v-if="is_active" :class="get_bem('suggestions')">
            <li
                v-for="term in matching_terms"
                :class="get_bem('suggestions__term')"
                @click.prevent="select_term(term.key, term.name)"
            >{{ term.name }}</li>
        </ul>
        <input
            v-model="searched_term"
            :class="get_bem('search')"
            @focusin="start_search"
            @focusout="end_search"
        />
        <slot :output="output"></slot>
    </div>
`