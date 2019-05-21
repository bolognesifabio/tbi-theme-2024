export default {
    toggle_search() {
        this.is_menu_open = false
        this.is_search_open = !this.is_search_open
        document.body.classList.remove("menu_open")
    },
    
    toggle_menu() {
        this.is_search_open = false
        this.is_menu_open = !this.is_menu_open
        if (this.is_menu_open) {
            document.body.classList.add("menu_open")
        } else {
            document.body.classList.remove("menu_open")
            this.info.menu_items.forEach(menu_item => {
                menu_item.classes.splice('menu-item-open')
            })
        }
    },

    render_menu_item_classes(menu_item) {
        let menu_item_classes = menu_item.classes.concat(['menu-item'])
        !menu_item.is_current || menu_item_classes.push('current-menu-item')

        if (menu_item.children && menu_item.children.length) {
            menu_item_classes.push('menu-item-has-children')
            const is_child_current = menu_item.children.find(child => {
                return child.is_current
            })

            !is_child_current || menu_item_classes.push('current-menu-ancestor')
        }

        return menu_item_classes.join(" ")
    },

    toggle_sub_menu(menu_item_id) {
        this.info.menu_items.forEach(menu_item => {
            if (menu_item.ID === menu_item_id) {
                menu_item.classes.includes('menu-item-open') ? menu_item.classes.splice('menu-item-open') : menu_item.classes.push('menu-item-open')
            } else {
                menu_item.classes.splice('menu-item-open')
            }
        })
    }
}