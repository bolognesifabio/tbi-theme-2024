import created from './_created'

export default {
    props: ['turns_input'],
    created,
    components: {
        'tbi-drag-and-drop': () => import('../../../drag-and-drop')
    }
}