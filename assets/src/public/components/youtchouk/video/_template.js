export default `
    <li class="youtchouk__videos__element" @click.prevent="switchVideo">
        <div class="youtchouk__videos__element__image">
            <img :src="video.snippet.thumbnails.default.url">
        </div>
        <div class="youtchouk__videos__element__description">
            <h3 class="youtchouk__videos__element__description__title" v-on:click="switchVideo()">{{ title }}</h3>
            <p class="youtchouk__videos__element__description__date"><i class="far fa-calendar-alt"></i> {{ formatDate(video.snippet.publishedAt) }}</p>
        </div>
    </li>
`