// const
//     CURRENT_BRANCH = process.env.CIRCLE_BRANCH.toUpperCase(),
//     ENVIRONMENT_KEY = process.env[`${CURRENT_BRANCH}_ENVIRONMENT`] || 'DEV02',
//     Promise_FTP = require('promise-ftp'),
//     read_local_folder = require('./_read-local-folder'),
//     read_remote_folder = require('./_read-remote-folder'),
//     deploy_package = require('./_deploy-package'),
//     make_directories = require('./_make-directories'),
//     remove_deprecated = require('./_remove-deprecated')
//     // LOCAL_FOLDER_FILES = read_local_folder('wp-content/plugins/tbi-plugin')
//     //     .concat(read_local_folder('wp-content/themes/tbi-theme'))

// require('events').EventEmitter.defaultMaxListeners = 99

// let ftp = new Promise_FTP()

// console.log(`${LOCAL_FOLDER_FILES.length} files to upload.\nConnecting to the server.`)

// ftp.connect({
//     host: process.env[`${ENVIRONMENT_KEY}_HOST`],
//     user: process.env[`${ENVIRONMENT_KEY}_USER`],
//     password: process.env[`${ENVIRONMENT_KEY}_PASS`],
//     port: 21,
//     forcePasv: true,
//     keepalive: 10000,
//     pasvTimeout: 120000,
//     autoReconnect: true
// })
    // .then(() => { return make_directories(ftp, LOCAL_FOLDER_FILES) })
    // .then(() => { return deploy_package(ftp, LOCAL_FOLDER_FILES) })
    // .then(() => { return read_remote_folder(ftp, 'wp-content/plugins/tbi-plugin') })
    // .then(remote_plugin_folder => { return read_remote_folder(ftp, 'wp-content/themes/tbi-theme', remote_plugin_folder) })
    // .then(remote_files => {
    //     const DEPRECATED_REMOTE_FILES = remote_files.filter(file => {
    //         return !LOCAL_FOLDER_FILES.includes(file)
    //     })

    //     return remove_deprecated(ftp, DEPRECATED_REMOTE_FILES)
    // })
    // .then(() => {
    //     console.log('Files deleted.')
    //     ftp.end()
    // })

// const Promise_FTP = require('promise-ftp')

// require('events').EventEmitter.defaultMaxListeners = 99

// let
//     ftp = new Promise_FTP(),
//     host = 'ftp.dev02tchoukballitalia.altervista.org',
//     user = 'dev02tchoukballitalia',
//     password = 'cZjsDU9T4sbC'

// ftp.connect({
//     host,
//     user,
//     password,
//     port: 21,
//     forcePasv: true,
//     keepalive: 10000,
//     pasvTimeout: 120000,
//     autoReconnect: true
// })
//     .then(() => {
//         console.log('CONNECTED')
//         ftp.end()
//     })




import handle_error from './_handle-error'
import connect from './_connect'
import read_local_folder from './_read-local-folder'
import make_remote_directories from './_make-remote-directories'
import deploy_package from './_deploy-package'
import read_remote_folder from './_read-remote-folder'
import remove_deprecated from './_remove-deprecated'

const
    CURRENT_BRANCH = process.env.CIRCLE_BRANCH.toUpperCase(),
    ENVIRONMENT_KEY = process.env[`${CURRENT_BRANCH}_ENVIRONMENT`] || 'DEV02'

class FTP_Deploy {
    constructor(connection_data) {
        console.log(connection_data)

        this.host = connection_data.host
        this.user = connection_data.user
        this.pass = connection_data.pass
        this.handle_error = handle_error
        this.connect = connect
        this.read_local_folder = read_local_folder
        this.make_remote_directories = make_remote_directories
        this.deploy_package = deploy_package
        this.read_remote_folder = read_remote_folder
        this.remove_deprecated = remove_deprecated

        this.start()
    }

    async start() {
        console.log(`\x1b[33mSTARTING DEPLOY ON ${ENVIRONMENT_KEY}\x1b[0m\n`)
        
        await this.connect()
        this.read_local_folder()
        await this.make_remote_directories()
        await this.deploy_package()
        await this.read_remote_folder()
        await this.remove_deprecated()

        console.log('\x1b[33mDEPLOY SUCCEDED\x1b[0m\n')

        this.ftp.end()
    }
}

new FTP_Deploy({
    host: process.env[`${ENVIRONMENT_KEY}_HOST`],
    user: process.env[`${ENVIRONMENT_KEY}_USER`],
    pass: process.env[`${ENVIRONMENT_KEY}_PASS`]
})