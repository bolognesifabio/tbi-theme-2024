const
    Promise_FTP = require('promise-ftp'),
    read_local_folder = require('./_read-local-folder'),
    read_remote_folder = require('./_read-remote-folder'),
    deploy_package = require('./_deploy-package'),
    make_directories = require('./_make-directories'),
    remove_deprecated = require('./_remove-deprecated'),
    LOCAL_FOLDER_FILES = read_local_folder('wp-content/plugins/tbi-plugin')   

require('events').EventEmitter.defaultMaxListeners = 99

let ftp = new Promise_FTP()

console.log(`${LOCAL_FOLDER_FILES.length} files to upload.\nConnecting to the server.`)

ftp.connect({
    host: process.argv[2],
    user: process.argv[3],
    password: process.argv[4],
    port: 21,
    forcePasv: true
})
    .then(() => { return make_directories(ftp, LOCAL_FOLDER_FILES) })
    .then(() => { return deploy_package(ftp, LOCAL_FOLDER_FILES) })
    .then(() => { return read_remote_folder(ftp, 'wp-content') })
    .then(remote_files => {
        const DEPRECATED_REMOTE_FILES = remote_files.filter(file => {
            return !LOCAL_FOLDER_FILES.includes(file)
        })

        return remove_deprecated(ftp, DEPRECATED_REMOTE_FILES)
    })
    .then(() => {
        console.log('Files deleted.')
        ftp.end()
    })