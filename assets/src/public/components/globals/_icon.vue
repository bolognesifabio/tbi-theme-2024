<script>
    import { library } from '@fortawesome/fontawesome-svg-core'
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

    import { faBars } from '@fortawesome/free-solid-svg-icons/faBars'
    import { faChevronRight } from '@fortawesome/free-solid-svg-icons/faChevronRight'
    import { faSearch } from '@fortawesome/free-solid-svg-icons/faSearch'
    import { faTimes } from '@fortawesome/free-solid-svg-icons/faTimes'

    library.add(
        faBars,
        faChevronRight,
        faSearch,
        faTimes
    )

    export default FontAwesomeIcon
</script>