export default `
    <section class="youtchouk row--boxed"">
        <div class="youtchouk__title">
            <h2>YouTchouk</h2>
        </div>

        <slot></slot>
        
        <tbi-vue-youtchouk-player 
            v-if="activeVideo.id"
            :active-video="activeVideo"
            :format-date="formatDate"
        ></tbi-vue-youtchouk-player>

        <ul class="youtchouk__videos">
            <tbi-vue-youtchouk-video
                v-for="video in videos"
                :class="{ hidden: video.id.videoId === activeVideo.id.videoId }"
                :active-video="activeVideo"
                :video="video"
                :key="video.id.videoId"
                :format-date="formatDate"
            ></tbi-vue-youtchouk-video>
        </ul>
    </section>
`