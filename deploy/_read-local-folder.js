const fs = require('fs-extra')

const read_local_folder = function(directory) {
    const FOLDER_CONTENT = fs.readdirSync(directory)
    let all_files = []
    
    FOLDER_CONTENT.forEach(resource => {
        const
            RESOURCE_PATH = `${directory}/${resource}`,
            RESOURCE_STAT = fs.statSync(RESOURCE_PATH),
            IS_DIRECTORY = RESOURCE_STAT && RESOURCE_STAT.isDirectory()

        if (IS_DIRECTORY) all_files.push(...read_local_folder(RESOURCE_PATH))
        else all_files.push(RESOURCE_PATH)
    })

    return all_files
}

module.exports = read_local_folder