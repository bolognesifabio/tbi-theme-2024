import axios from 'axios'

export default {
    check_validation(index, value, validator) {
        this.fields[index].error = !value.match(validator)
    },
    check_empty_fields() {
        console.log('ciao')
        let form_has_empty_fields = false
        this.fields = this.fields.map(field => {
            if (field.value === "") {
                form_has_empty_fields = true
                field.error = true
            }
            return field
        })

        return form_has_empty_fields
    },
    send_form() {
        this.check_empty_fields()
        console.log('ciao')
        if (!this.form_has_errors) {
            let form_output = {
                message: this.message
            }

            this.fields.forEach(field => {
                form_output[field.name] = field.value
            })

            this.is_request_pending = true

            axios({
                method: 'post',
                url: '/wp-content/themes/tbi-theme/components/contact-form/main.php',
                data: Object.keys(form_output).map(key => {
                    return `${encodeURIComponent(key)}=${encodeURIComponent(form_output[key])}`
                }).join('&')
            })
            .then(is_mail_sent => {
                console.log(is_mail_sent.data)
                this.is_request_pending = false
                this.mail_has_errors = is_mail_sent.data !== true
                if (is_mail_sent) {
                    this.show_thank_you_message = true
                }
            })
            .catch(error => {
                this.is_request_pending = false
                this.mail_has_errors = true
            })
        }
    }
}