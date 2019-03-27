const
    CURRENT_BRANCH = process.env.CIRCLE_BRANCH.toUpperCase(),
    ENVIRONMENT_KEY = process.env[`${CURRENT_BRANCH}_ENVIRONMENT`] || 'DEV02',
    Promise_FTP = require('promise-ftp'),
    read_local_folder = require('./_read-local-folder'),
    read_remote_folder = require('./_read-remote-folder'),
    deploy_package = require('./_deploy-package'),
    make_directories = require('./_make-directories'),
    remove_deprecated = require('./_remove-deprecated')
    LOCAL_FOLDER_FILES = read_local_folder('wp-content/plugins/tbi-plugin')
        .concat(read_local_folder('wp-content/themes/tbi-theme'))

require('events').EventEmitter.defaultMaxListeners = 99

let ftp = new Promise_FTP()

console.log(`${LOCAL_FOLDER_FILES.length} files to upload.\nConnecting to the server.`)

ftp.connect({
    host: process.env[`${ENVIRONMENT_KEY}_HOST`],
    user: process.env[`${ENVIRONMENT_KEY}_USER`],
    password: process.env[`${ENVIRONMENT_KEY}_PASS`],
    port: 21,
    forcePasv: true,
    keepalive: 10000,
    pasvTimeout: 120000,
    autoReconnect: true
})
    .then(() => { return make_directories(ftp, LOCAL_FOLDER_FILES) })
    .then(() => { return deploy_package(ftp, LOCAL_FOLDER_FILES) })
    .then(() => { return read_remote_folder(ftp, 'wp-content/plugins/tbi-plugin') })
    .then(remote_plugin_folder => { return read_remote_folder(ftp, 'wp-content/themes/tbi-theme', remote_plugin_folder) })
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