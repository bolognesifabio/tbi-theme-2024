require('events').EventEmitter.defaultMaxListeners = 99

const deploy_package = function (ftp, input_files) {
    return new Promise(resolve => {
        console.log('Connection succeded.\nCreating remote directories.')
        resolve(Promise.all(input_files.map(file => {
            let remote_folder_path = file.split('/')
            remote_folder_path.pop()

            const REMOTE_FOLDER = remote_folder_path.join('/')
            return ftp.mkdir(REMOTE_FOLDER, true)
        })))
    })
}

module.exports = deploy_package