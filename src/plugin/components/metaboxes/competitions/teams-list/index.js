import methods from './_methods'
import computed from './_computed'
import beforeMount from './_before-mount'

import style from './style.scss'

export default {
    props: ['teams_input'],
    computed,
    beforeMount,
    style,
    methods
}