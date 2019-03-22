const
    read_local_folder = require('./_read-local-folder'),
    read_remote_folder = require('./_read-remote-folder'),
    LOCAL_FOLDER_FILES = read_local_folder('wp-content/plugins/tbi-plugin')

console.log(`Local folder contains ${LOCAL_FOLDER_FILES.length} files`)

read_remote_folder('test-ftp').then(remote_files => {
    console.log(`Remote folder contains ${remote_files.length} files`)
})