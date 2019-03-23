require('events').EventEmitter.defaultMaxListeners = 99

const deploy_package = function (ftp, input_files) {
    return new Promise(resolve => {
        resolve(Promise.all(input_files.map(file => {
            return ftp.put(file, file)
        })))
    })
}

module.exports = deploy_package