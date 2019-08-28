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
            },

            scroll_position: 0,
            $body: document.querySelectorAll('body')
        },

        components: {
            "tbi-top-menu": () => import('./components/layout/top-menu.vue')
        },

        computed: {
            is_scrolled_from_top() {
                return this.scroll_position > 200
            }
        },

        mounted() {
            window.addEventListener('resize', this.throttle(this.check_viewport_changes, 200))
            window.addEventListener('scroll', () => { window.requestAnimationFrame(this.check_scroll) })
            this.check_viewport_changes()
            this.check_scroll()
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
                const DOCUMENT_WIDTH = document.documentElement.clientWidth

                let viewport = {
                    is_ge_tablet: DOCUMENT_WIDTH >= 768,
                    is_ge_desktop: DOCUMENT_WIDTH >= 1024,
                    is_ge_large_desktop: DOCUMENT_WIDTH >= 1440
                }
                
                if (JSON.stringify(viewport) !== JSON.stringify(this.viewport)) this.viewport = viewport
            },

            check_scroll() {
                this.scroll_position = window.pageYOffset
            }
        }
    })
}