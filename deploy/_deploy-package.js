// const deploy_package = function (ftp, input_files) {
//     return new Promise(resolve => {
//         console.log('Remote directories created.\n\nUploading files:')
//         resolve(Promise.all(input_files.map(file => {
//             return ftp.put(file, file)
//                 .then(() => {
//                     console.log(`- ${file}`)
//                 })
//         })))
//     })
// }

import { EventEmitter } from 'events'

EventEmitter.defaultMaxListeners = 999

export default async function () {
    try {
        for (let file of this.local_files) {
            await this.ftp.put(file, `wp-content/themes/tbi-theme/${file}`)
            console.log(`    \x1b[36mwp-content/themes/tbi-theme/${file}\x1b[0m uploaded.`)
        }
    } catch(error) { this.handle_error('Error while uploading local files to remote.', error) }

    console.log('\x1b[32m ', 'All files uploaded to remote.', '\x1b[0m\n')
}