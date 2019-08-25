export default function() {
    this.player = new YT.Player('youtchouk-player', {
        height: '400',
        width: '100%',
        videoId: this.activeVideo.id.videoId,
        playerVars: {
            controls: 2,
            showinfo: 0,
            modestbranding: 1,
            rel: 0
        }
    })
}