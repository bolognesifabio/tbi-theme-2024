export default /* html */ `
    <div v-if="is_league(slot_props.slide.type)" :class="slot_props.base_class + '__fixtures'">
        <h3 :class="slot_props.base_class + '__fixtures__title'">Calendario</h3>
        
        <tbi-vue-page-component-fixtures-round
            :slides="slot_props.slide.rounds"
            :base_class="slot_props.base_class + '__fixtures__rounds'"
            :show_logos="true"
        ></tbi-vue-page-component-fixtures-round>
    </div>
`