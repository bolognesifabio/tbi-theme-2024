export default {
    bem(element = '', modifiers = {}) {
        const
            BEM_BASE = this.bem_base ? `${this.bem_base}__` : '',
            BEM_ELEMENT = `${BEM_BASE}${element}`,
            ACTIVE_MODIFIERS = Object.keys(modifiers).filter(modifier => { return modifiers[modifier] }),
            BEM_MODIFIERS = ACTIVE_MODIFIERS.map(modifier => { return `${BEM_ELEMENT}--${modifier}` }).join(' ')

        return `${BEM_ELEMENT} ${BEM_MODIFIERS}`
    }
}