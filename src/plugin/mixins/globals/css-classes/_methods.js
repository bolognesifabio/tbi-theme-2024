export default {
    get_bem(elements = '', modifiers = {}) {        
        let active_modifiers = []

        for (const modifier_name in modifiers) {
            if (modifiers[modifier_name]) active_modifiers.push(modifier_name)
        }

        const BEM_BASE = this.base_class ? `${this.base_class}__` : ''
        const BEM_ELEMENTS = `${BEM_BASE}${elements}`
        const BEM_MODIFIERS = active_modifiers.map(modifier => {
            return `${BEM_ELEMENTS}--${modifier}`
        }).join(' ')

        return `${BEM_ELEMENTS} ${BEM_MODIFIERS}`
    }
}