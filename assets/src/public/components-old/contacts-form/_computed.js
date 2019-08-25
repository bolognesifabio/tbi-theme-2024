export default {
    has_form_errors() {
        return this.fields.filter(field => {
            return field.error
        }).length > 0
    }
}