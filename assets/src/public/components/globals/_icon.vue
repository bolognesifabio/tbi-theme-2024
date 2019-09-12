<script>
    import { library } from '@fortawesome/fontawesome-svg-core'
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

    import { faBars } from '@fortawesome/free-solid-svg-icons/faBars'
    import { faChevronRight } from '@fortawesome/free-solid-svg-icons/faChevronRight'
    import { faCaretRight } from '@fortawesome/free-solid-svg-icons/faCaretRight'
    import { faCaretDown } from '@fortawesome/free-solid-svg-icons/faCaretDown'
    import { faSearch } from '@fortawesome/free-solid-svg-icons/faSearch'
    import { faTimes } from '@fortawesome/free-solid-svg-icons/faTimes'

    import { faCalendarAlt } from '@fortawesome/free-regular-svg-icons/faCalendarAlt'

    import { faInstagram } from '@fortawesome/free-brands-svg-icons/faInstagram'
    import { faFlickr } from '@fortawesome/free-brands-svg-icons/faFlickr'
    import { faFacebookSquare } from '@fortawesome/free-brands-svg-icons/faFacebookSquare'
    import { faYoutube } from '@fortawesome/free-brands-svg-icons/faYoutube'

    library.add(
        faBars,
        faChevronRight,
        faCaretRight,
        faCaretDown,
        faSearch,
        faTimes,
        faCalendarAlt,
        faInstagram,
        faFlickr,
        faFacebookSquare,
        faYoutube
    )

    export default FontAwesomeIcon
</script>