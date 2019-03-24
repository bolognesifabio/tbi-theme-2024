require('events').EventEmitter.defaultMaxListeners = 999

const deploy_package = function (ftp, input_files) {
    return new Promise(resolve => {
        console.log('Remote directories created.\n\nUploading files:')
        resolve(Promise.all(input_files.map(file => {
            return ftp.put(file, file)
                .then(() => {
                    console.log(`- ${file}`)
                })
        })))
    })
}

module.exports = deploy_package