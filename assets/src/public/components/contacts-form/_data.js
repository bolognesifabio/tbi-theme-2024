export default function() {
    return {
        message: "",
        base_class: "contacts__send",
        fields: [
            {
                name: 'firstname',
                type: 'text',
                placeholder: 'Nome',
                icon: 'user',
                value: "",
                validator: /^[a-zA-Zàèéìòù\'\s]*$/,
                error: false
            },
            {
                name: 'lastname',
                type: 'text',
                placeholder: 'Cognome',
                icon: 'user',
                value: "",
                validator: /^[a-zA-Zàèéìòù\'\s]*$/,
                error: false
            },
            {
                name: 'email',
                type: 'email',
                placeholder: 'Email',
                icon: 'envelope',
                value: "",
                validator: /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$|^.{0}$/,
                error: false
            },
            {
                name: 'topic',
                type: 'text',
                placeholder: 'Oggetto',
                icon: 'comment-dots',
                value: "",
                validator: /^[a-zA-Z\dàèéìòù\'\s]*$/,
                error: false
            }
        ],
        has_mail_errors: false,
        is_request_pending: false,
        show_thank_you_message: false
    }
}