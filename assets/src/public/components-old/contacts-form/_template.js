export default /* html */ `
    <div :class="base_class">
        <h1 :class="base_class + '__title'">Scrivici</h1>

        <form :class="base_class + '__form'" v-if="!show_thank_you_message">
            <p :class="base_class + '__form__subtitle'">Compila il form sottostante se vuoi inviarci un messaggio.<br>Tutti i campi sono obbligatori.</p>
            <p :class="base_class + '__form__error'" v-show="has_form_errors"><i class="fas fa-exclamation-circle"></i> Alcuni campi non sono stati compilati correttamente.</p> <p :class="base_class + '__form__error'" v-if="has_mail_errors"><i class="fas fa-exclamation-circle"></i> C'&egrave; stato un errore nell'invio della mail, riprova pi&ugrave; tardi.</p>

            <div v-for="(field, index) in fields" :class="[base_class + '__form__field', { error: field.error }]">
                <label :class="base_class + '__form__field__label'"><i :class="'fas fa-' + field.icon"></i></label>
                <input
                    v-model="field.value"
                    :class="base_class + '__form__field__input'"
                    :type="field.type"
                    :name="field.name"
                    :placeholder="field.placeholder"
                    @focusout.prevent="check_validation(index, field.value, field.validator)"
                />
            </div>

            <div :class="[base_class + '__form__field', base_class + '__form__field--textarea']">
                <label :class="base_class + '__form__field__label'">Messaggio</label>
                <textarea :class="base_class + '__form__field__input'" name="message" v-model="message"></textarea>
            </div>

            <div :class="base_class + '__form__field'">
                <button :class="base_class + '__form__field__button'" :disabled="is_request_pending" @click.prevent="send_form">{{ is_request_pending ? 'Attendi' : 'Invia' }}</button>
            </div>
        </form>
        <div :class="base_class + '__thank-you'" v-if="show_thank_you_message">
            <p>Grazie per averci contattati.</p>
        </div>
    </div>
`