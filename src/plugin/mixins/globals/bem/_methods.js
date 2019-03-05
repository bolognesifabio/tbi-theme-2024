export default {
    bem(elements = '', modifiers = {}) {        
        let active_modifiers = Object.keys(modifiers).filter(modifier_name => {
            return modifiers[modifier_name]
        })

        const BEM_BASE = this.bem_base ? `${this.bem_base}__` : ''
        const BEM_ELEMENTS = `${BEM_BASE}${elements}`
        const BEM_MODIFIERS = active_modifiers.map(modifier_name => {
            return `${BEM_ELEMENTS}--${modifier_name}`
        }).join(' ')

        return `${BEM_ELEMENTS} ${BEM_MODIFIERS}`
    }
}