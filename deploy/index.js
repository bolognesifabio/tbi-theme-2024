const read_local_folder = require('./_read-local-folder')


const test = async function() {
    let all_files = await read_local_folder('wp-content/plugins/tbi-plugin')
    console.log('--------------')
    console.log(all_files)
}

test()