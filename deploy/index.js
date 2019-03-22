const
    read_local_folder = require('./_read-local-folder'),
    read_remote_folder = require('./_read-remote-folder'),
    LOCAL_FOLDER_FILES = read_local_folder('wp-content/plugins/tbi-plugin')

read_remote_folder(LOCAL_FOLDER_FILES, 'wp-content').then(remote_files => {
    const DEPRECATED_REMOTE_FILES = remote_files.filter(file => {
        return !LOCAL_FOLDER_FILES.includes(file)
    })

    console.log(DEPRECATED_REMOTE_FILES)
})