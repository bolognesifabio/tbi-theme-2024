import Vue from 'vue'
import root from './root'

Vue.component('tbi-vue-youtchouk', root)

const checkYouTubeAPIReady = _ => {
    try {
        YT.Player || requestAnimationFrame(checkYouTubeAPIReady)
    } catch (err) {
        requestAnimationFrame(checkYouTubeAPIReady)
    }
}

checkYouTubeAPIReady()