export default `
    <div class="youtchouk__player">
        <div id="youtchouk-player"></div>
        <h3 class="youtchouk__player__title">{{ activeVideo.snippet.title }}</h3>
        <p class="youtchouk__player__date"><i class="far fa-calendar-alt"></i> {{ formatDate(activeVideo.snippet.publishedAt) }}</p>
        <p class="youtchouk__player__description">{{ activeVideo.snippet.description }}</p>
    </div>
`