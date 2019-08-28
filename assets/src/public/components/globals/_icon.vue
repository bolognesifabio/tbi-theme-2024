<script>
    import { library } from '@fortawesome/fontawesome-svg-core'
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

    import { faBars } from '@fortawesome/free-solid-svg-icons/faBars'
    import { faCaretRight } from '@fortawesome/free-solid-svg-icons/faCaretRight'
    import { faCaretDown } from '@fortawesome/free-solid-svg-icons/faCaretDown'
    import { faSearch } from '@fortawesome/free-solid-svg-icons/faSearch'
    import { faTimes } from '@fortawesome/free-solid-svg-icons/faTimes'

    library.add(
        faBars,
        faCaretRight,
        faCaretDown,
        faSearch,
        faTimes
    )

    export default FontAwesomeIcon
</script>