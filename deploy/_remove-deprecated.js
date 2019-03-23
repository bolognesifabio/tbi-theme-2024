require('events').EventEmitter.defaultMaxListeners = 999

const remove_deprecated = (ftp, deprecated_files) => {
    return new Promise(resolve => {
        console.log('Remote folders readed.\nDeleting deprecated files.')
        resolve(Promise.all(deprecated_files.map(file => {
            return ftp.delete(file)
        })))
    })
}

module.exports = remove_deprecated