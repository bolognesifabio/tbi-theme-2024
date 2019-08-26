<script>
    import { library } from '@fortawesome/fontawesome-svg-core'
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

    import { faBars } from '@fortawesome/free-solid-svg-icons/faBars'
    import { faChevronRight } from '@fortawesome/free-solid-svg-icons/faChevronRight'

    library.add(
        faBars,
        faChevronRight
    )

    export default FontAwesomeIcon
</script>