const fs = require('fs-extra')

const read_local_folder = async function(directory) {
    let all_files = []

    await fs.readdir(directory, async (error, resources) => {
        await resources.forEach(async resource => {
            const RESOURCE_PATH = `${directory}/${resource}`

            await fs.stat(RESOURCE_PATH, (stat_error, stat) => {
                const IS_DIRECTORY = stat && stat.isDirectory()

                if (IS_DIRECTORY && all_files.push) {
                    all_files.push('/')

                    console.log(all_files.length)
                    // console.log("\n\n")
                    // all_files.push(...read_local_folder(RESOURCE_PATH))
                }
                else all_files.push(RESOURCE_PATH)
            })
        })
    })

    console.log('asd')

    return all_files

}

module.exports = read_local_folder