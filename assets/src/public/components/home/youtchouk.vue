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
                        height: '100%',
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
    @import '../../styles/mixins';

    .youtchouk {
        &__title {
            padding: 6.5rem 1.5rem 1.5rem 1.5rem;
        }

        &__inner {
            padding: 3rem 1.5rem;
            background: $gradient-youtchouk-bg;
        }

        &__player,
        &__videos__item {
            padding: 1.5rem;
            background: $gradient-youtchouk-fg;
            color: $color-fg-variant;
        }

        &__player__date,
        &__videos__item__content__date {
            @include font-title;
            color: $color-green-main;
            font-size: 1.2rem;
            font-weight: 700;
            margin: 0;
            padding-top: .75rem;
        }

        &__player {
            &__container {
                width: 100%;
                padding-top: 56.25%;
                position: relative;

                &__video {
                    position: absolute;
                    top: 0;
                    left: 0;
                    height: 100%;
                    width: 100%;
                }
            }

            &__title {
                font-size: 2rem;
                font-weight: 600;
                margin: 0;
                padding-top: 1.5rem;
            }
        }

        &__videos {
            &__item {
                margin-top: 1.5rem;
                display: grid;
                grid-template-columns: minmax(0, min-content) 1fr;
                grid-template-rows: 1fr;
                grid-column-gap: 1.5rem;
                grid-row-gap: 1.5rem;
                cursor: pointer;

                &__thumbnail {
                    grid-column: 1;
                    grid-row: 1;
                    position: relative;

                    &__image {
                        width: auto;
                        height: auto;
                        max-height: 8rem;
                        opacity: .6;
                    }

                    &__icon {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        color: $color-neutral-9;
                        opacity: .8;
                        font-size: 1.6rem;
                    }
                }

                &__content {
                    grid-column: 2;
                    grid-row: 1;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;

                    &__title,
                    &__date {
                        margin: 0;
                    }

                    &__title {
                        font-weight: 600;
                        font-size: 1.6rem;
                    }
                }
            }
        }

        @include media-tablet {
            display: flex;
            flex-direction: column;
            padding: 0;

            &__inner {
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-template-rows: 1fr;
                grid-column-gap: 1.5rem;
            }

            &__player {
                grid-column: 1;
                grid-row: 1;
            }

            &__videos {
                grid-column: 2;
                grid-row: 1;

                &__item {
                    &:first-child {
                        margin-top: 0;
                    }
                }
            }
        }

        @include media-desktop {
            &__videos {
                &__item {
                    &:hover & {
                        &__thumbnail {
                            &__image,
                            &__icon {
                                opacity: 1;
                            }
                        }

                        &__content {
                            &__title {
                                text-decoration: underline;
                            }
                        }
                    }
                }
            }
        }
    }
</style>