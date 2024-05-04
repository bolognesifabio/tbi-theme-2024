export default {
    formatDate(input) {
        const date = new Date(input)
        const day = date.getDate() < 10 ? `0${date.getDate()}` : date.getDate()
        const month = date.getMonth() < 10 ? `0${date.getMonth()}` : date.getMonth()
        return `${day}-${month}-${date.getFullYear()}`
    }
}
