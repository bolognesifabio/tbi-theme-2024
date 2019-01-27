<h3>Selezione squadre</h3>

<tbi-competitions-filters inline-template>
    <ul class="competitions-metaboxes__teams__filters">
        <tbi-field label="Mostra solo squadre attive" class="competitions-metaboxes__teams__filters__field">
            <tbi-switch-checkbox>
                <input slot-scope="slot_props" :class="slot_props.bem_class" :type="slot_props.type" v-model="$root.state.are_inactive_hidden" />
            </tbi-switch-checkbox>
        </tbi-field>

        <tbi-field label="Mostra solo squadre selezionate" class="competitions-metaboxes__teams__filters__field">
            <tbi-switch-checkbox>
                <input slot-scope="slot_props" :class="slot_props.bem_class" :type="slot_props.type" v-model="$root.state.are_unselected_hidden" />
            </tbi-switch-checkbox>
        </tbi-field>
    </ul>
</tbi-competitions-filters>