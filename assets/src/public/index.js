import Vue from 'vue'

import './components/globals'
import './components-old'

if (document.getElementById('tbi-vue')) {
    new Vue({
        el: '#tbi-vue',

        data: {
            viewport: {
                is_ge_tablet: false,
                is_ge_desktop: false,
                is_ge_large_desktop: false
            }
        },

        components: {
            "tbi-top-menu": () => import('./components/layout/top-menu.vue')
        },

        mounted() {
            window.addEventListener('resize', this.throttle(this.check_viewport_changes, 200))
            this.check_viewport_changes()
        },

        methods: {
            debounce(callback, delay) {
                let timeout

                return (...args) => {
                    const context = this
                    clearTimeout(timeout)
                    timeout = setTimeout(() => callback.apply(context, args), delay)
                }
            },

            throttle(callback, delay) {
                let last_call = 0

                return (...args) => {
                    const NOW = (new Date).getTime()

                    if (NOW - last_call < delay) return

                    last_call = NOW
                    return callback(...args)
                }
            },

            check_viewport_changes() {
                let viewport = {
                    is_ge_tablet: window.innerWidth >= 768,
                    is_ge_desktop: window.innerWidth >= 1024 && window.innerWidth < 1440,
                    is_ge_large_desktop: window.innerWidth >= 1440
                }
                
                if (JSON.stringify(viewport) !== JSON.stringify(this.viewport)) this.viewport = viewport
            }
        }
    })
}