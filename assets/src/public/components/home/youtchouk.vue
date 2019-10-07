<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                videos: [],
                player: null
            }
        },

        created() {
            this.init_player()
            this.load_videos()
        },

        computed: {
            active_video() {
                return this.videos.find(video => {
                    return video.is_active
                })
            }
        },

        methods: {
            init_player() {
                try {
                    if (YT.Player) this.player = new YT.Player('youtchouk-player', {
                        height: '400',
                        width: '100%',
                        videoId: this.active_video.id.videoId,
                        playerVars: {
                            controls: 2,
                            showinfo: 0,
                            modestbranding: 1,
                            rel: 0
                        }
                    })
                    else requestAnimationFrame(this.init_player)
                } catch (err) { requestAnimationFrame(this.init_player) }
            },

            async load_videos() {
                const PARAMETERS = {
                    part: 'snippet,id',
                    channelId: 'UCk-yiNtuE5b0RjDQLDoE_8A',
                    order: 'date',
                    maxResults: '5'
                }
                
                let url = `https://www.googleapis.com/youtube/v3/search?key=AIzaSyDm3kUM9kYO6ZUL3NAknLGCsd1BLrBgPws`
                
                for (const key in PARAMETERS) url += `&${key}=${PARAMETERS[key]}`

                let { data } = await axios.get(url)

                this.videos = data.items
                this.videos[0].is_active = true
            },

            get_formatted_date(input_date) {
                const
                    DATE = new Date(input_date),
                    DAY = DATE.getDate() < 10 ? `0${DATE.getDate()}` : DATE.getDate(),
                    MONTH = DATE.getMonth() < 10 ? `0${DATE.getMonth()}` : DATE.getMonth()

                return `${DAY}/${MONTH}/${DATE.getFullYear()}`
            },

            select_video(selected_video_id) {
                this.videos = this.videos.map(video => {
                    video.is_active = video.id.videoId === selected_video_id
                    return video
                })

                this.player.loadVideoById(selected_video_id)
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../styles/constants';

    .youtchouk {
        padding: 6.5rem 1.5rem;

        &__title {
            padding-bottom: 1.5rem;
            margin-bottom: 1.5rem;
            border-bottom: .1rem solid $color-borders-dark;
        }
    }
</style>