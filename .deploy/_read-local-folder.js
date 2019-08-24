import fs from 'fs-extra'

const IGNORE_LIST = [
    './.circleci',
    './.deploy',
    './.git',
    './.gitattributes',
    './.vscode',
    './.babelrc',
    './.gitignore',
    './.gitattributes',
    './assets/src',
    './node_modules',
    './package-lock.json',
    './package.json',
    './webpack.config.js'
]

const read_folder = function (directory) {
    const FOLDER_CONTENT = fs.readdirSync(directory)
    let all_files = []

    FOLDER_CONTENT.forEach(resource => {
        const
            RESOURCE_PATH = `${directory}${resource}`,
            RESOURCE_STAT = fs.statSync(RESOURCE_PATH),
            IS_DIRECTORY = RESOURCE_STAT && RESOURCE_STAT.isDirectory(),
            HAS_TO_BE_IGNORED = IGNORE_LIST.includes(RESOURCE_PATH)

        if (HAS_TO_BE_IGNORED) return

        if (IS_DIRECTORY) all_files.push(...read_folder(`${RESOURCE_PATH}/`))
        else all_files.push(RESOURCE_PATH)
    })

    return all_files
}

export default function () {
    console.log('- Reading local folder...')
    
    try {
        this.local_files = read_folder('./')
        console.log('\x1b[32m ', `${this.local_files.length} files to upload.`, '\x1b[0m\n')
    } catch (error) { this.handle_error('Error reading local folder.', error) }
}