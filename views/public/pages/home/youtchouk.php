<tbi-home-youtchouk inline-template>
    <div class="youtchouk layout-row">
        <h2 class="youtchouk__title">YouTchouk</h2>

        <div v-if="active_video" class="youtchouk__player">
            <div class="youtchouk__player__video" id="youtchouk-player"></div>
            <h3 class="youtchouk__player__title">{{ active_video.snippet.title }}</h3>
            <p class="youtchouk__player__date">
                <tbi-icon class="youtchouk__player__date__icon" :icon="['far', 'calendar-alt']"></tbi-icon>
                {{ get_formatted_date(active_video.snippet.publishedAt) }}
            </p>
            <p class="youtchouk__player__description">{{ active_video.snippet.description }}</p>
        </div>

        <ul class="youtchouk__videos">
            <li class="youtchouk__videos__item" v-for="video in videos" @click.prevent="select_video(video.id.videoId)">
                <img class="youtchouk__videos__item__image" :src="video.snippet.thumbnails.default.url">
                <h3 class="youtchouk__videos__item__title" @click.prevent="select_video(video.id.videoId)">{{ video.snippet.title }}</h3>
                <p class="youtchouk__videos__item__date">
                    <tbi-icon class="youtchouk__player__date__icon" :icon="['far', 'calendar-alt']"></tbi-icon>
                    {{ get_formatted_date(video.snippet.publishedAt) }}
                </p>
            </li>
        </ul>
    </div>
</tbi-home-youtchouk>