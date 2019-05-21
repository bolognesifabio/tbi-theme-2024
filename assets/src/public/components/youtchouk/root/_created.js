export default function() {
    const parameters = {
        part: 'snippet,id',
        channelId: 'UCk-yiNtuE5b0RjDQLDoE_8A',
        order: 'date',
        maxResults: '5'
    }

    let url = `https://www.googleapis.com/youtube/v3/search?key=AIzaSyDm3kUM9kYO6ZUL3NAknLGCsd1BLrBgPws`
    
    for (const key in parameters) { url += `&${key}=${parameters[key]}` }
    
    fetch(url).then(response => {
        return response.json();
    }).then(responseJSON => {
        this.activeVideo = responseJSON.items[0]
        this.videos = responseJSON.items
    })
}