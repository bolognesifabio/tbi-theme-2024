import Vue from 'vue'

export default {
    props: ['draggable_type', 'droppable_types', 'element', 'callback'],
    created() {
        Vue.set(this.$root.state, 'dragged_object', null)
    },
    computed: {
        is_draggable() {
            return this.draggable_type ? true : false
        }
    },
    methods: {
        prevent_if_droppable(event) {
            let droppable_types = typeof this.droppable_types === 'Array' ? this.droppable_types : [this.droppable_types]

            if (droppable_types.indexOf(this.$root.state.dragged_object.type)) {
                event.preventDefault()
            }
        },

        update_dragged_object() {
            this.$root.state.dragged_object = {
                data: this.element,
                type: this.draggable_type
            }
        },

        drop() {
            this.callback()
            this.$root.state.dragged_object = null
        }
    },
    template: /* html */ `
        <div
            :draggable="is_draggable"
            @dragover="event => prevent_if_droppable(event)"
            @dragstart="update_dragged_object()"
            @drop.prevent="drop()"
        >
            <slot></slot>
        </div>
    `
}