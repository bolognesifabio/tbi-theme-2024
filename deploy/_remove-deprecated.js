require('events').EventEmitter.defaultMaxListeners = 99

const remove_deprecated = (ftp, deprecated_files) => {
    return new Promise(resolve => {
        resolve(Promise.all(deprecated_files.map(file => {
            return ftp.delete(file)
        })))
    })
}

module.exports = remove_deprecated