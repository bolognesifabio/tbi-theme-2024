export default {
    switchVideo() {
        this.$parent.activeVideo = this.video
    },
    excerptTitle() {
        let title = this.video.snippet.title
        const characters = title.split('')
        if (characters.length > 90) {
            title = title.split(' ').reduce((excerpted, word) => {
                return excerpted.length + word.length <= 90 ? excerpted += `${word} ` : excerpted
            }, "")

            title = `${title.trim()}...`
        }

        return title
    }
}