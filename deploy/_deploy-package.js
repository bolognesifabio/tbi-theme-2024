require('events').EventEmitter.defaultMaxListeners = 99

const deploy_package = function (ftp, input_files) {
    return new Promise(resolve => {
        console.log('Remote directories created.\nUploading files.')
        resolve(Promise.all(input_files.map(file => {
            return ftp.put(file, file)
        })))
    })
}

module.exports = deploy_package