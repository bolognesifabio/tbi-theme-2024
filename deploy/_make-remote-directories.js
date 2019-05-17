import { EventEmitter } from 'events'

EventEmitter.defaultMaxListeners = 999

export default async function() {
    console.log('- Creating remote directories...')

    let local_directories = this.local_files.map(file => {
        let local_folder_path = file.split('/')
        local_folder_path.pop()
        local_folder_path.shift()
        return local_folder_path.join('/')
    })

    local_directories = local_directories.filter(directory => { return directory })

    const REMOTE_DIRECTORIES = [...new Set(local_directories)]

    try {
        for (let directory of REMOTE_DIRECTORIES) {
            await this.ftp.mkdir(`wp-content/themes/tbi-theme/${directory}`, true)
            console.log(`    \x1b[36m${directory}\x1b[0m created.`)
        }

        console.log('\x1b[32m  All remote folders created.\x1b[0m\n')
    } catch(error) { this.handle_error('Error while creating remote folders.', error) }
}
