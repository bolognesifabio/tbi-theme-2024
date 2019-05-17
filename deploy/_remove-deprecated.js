import { EventEmitter } from 'events'

EventEmitter.defaultMaxListeners = 999

export default async function() {
    console.log('- Removing deprecated files and folders...')

    const DEPRECATED_FILES = this.remote_files.filter(file => {
        console.log(file)
        return !this.local_files.includes(file.replace('wp-content/themes/tbi-theme/', './'))
    })

    if (!DEPRECATED_FILES.length) {
        console.log('\x1b[32m ', 'No remote files to remove.', '\x1b[0m\n')
        return
    }

    try {
        for (let file of DEPRECATED_FILES) {
            await this.ftp.delete(file)
            console.log(`    \x1b[36m${file}\x1b[0m removed.`)
            
            let removed_file_path = file.split('/')
            removed_file_path.pop()
            let removed_file_folder_path = removed_file_path.join('/')

            let removed_file_folder = await this.ftp.list(removed_file_folder_path)
            
            if (!removed_file_folder.length) {
                await this.ftp.rmdir(removed_file_folder_path)
                console.log(`    \x1b[36m${removed_file_folder_path}\x1b[0m removed because empty.`)
            }
        }
    } catch(error) { this.handle_error('Error while removing deprecated files and folders.', error) }

    console.log('\x1b[32m ', 'All remote deprecated files and folders removed.', '\x1b[0m\n')
}