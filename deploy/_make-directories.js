require('events').EventEmitter.defaultMaxListeners = 999

const deploy_package = function (ftp, input_files) {
    return new Promise(resolve => {
        console.log('Connection succeded.\n\nCreating remote directories:')
        let local_directories = input_files.map(input_file => {
            let local_folder_path = input_file.split('/')
            local_folder_path.pop()
            return local_folder_path.join('/')
        })

        const REMOTE_DIRECTORIES = [...new Set(local_directories)]

        resolve(Promise.all(REMOTE_DIRECTORIES.map(directory => {
            return ftp.mkdir(directory, true)
                .then(() => {
                    console.log(`- ${directory}`)
                })
        })))
    })
}

module.exports = deploy_package