const flatten_files_list = files_list => {
    let output_list = []

    Object.keys(files_list).forEach(key => {
        const FILE = files_list[key]

        if (typeof FILE === "object") output_list.push(...flatten_files_list(FILE))
        else output_list.push(FILE)
    })

    return output_list
}

const read_folder = async (ftp, directory) => {
    return await ftp.list(directory).map(async resource => {
        if (resource.type !== 'd') return `${directory}/${resource.name}`
        return await read_folder(ftp, `${directory}/${resource.name}`)
    })
}

export default async function() {
    console.log('- Reading remote folder...')

    try {
        let remote_files = await read_folder(this.ftp, 'wp-content/themes/tbi-theme')
        this.remote_files = flatten_files_list(remote_files)
        
        console.log('\x1b[32m ', 'Remote folder readed.', '\x1b[0m\n')
    } catch(error) { this.handle_error('Error reading remote folder.', error) }
}