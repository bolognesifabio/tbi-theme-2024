require('events').EventEmitter.defaultMaxListeners = 999

const read_remote_folder = function(ftp, directory) {
    return new Promise(resolve => {
        console.log('Files uploaded.\n\nReading remote folder.')
        read_folder(ftp, directory)
            .then(result => {
                let output = flatten_files_list(result)
                resolve(output)
            }).catch(error => {
                console.log(error)
                ftp.end()
            })
    })
}

const read_folder = (ftp, directory) => {
    return new Promise(resolve => {
        ftp.list(directory)
            .then(resources => {
                resolve(Promise.all(resources.map(resource => {
                    if (resource.type === 'd') return read_folder(ftp, `${directory}/${resource.name}`)
                    else return `${directory}/${resource.name}`
                })))
            })
    })
}

const flatten_files_list = files_list => {
    let output_list = []
    
    Object.keys(files_list).forEach(key => {
        const FILE = files_list[key]

        if (typeof FILE === "object") output_list.push(...flatten_files_list(FILE))
        else output_list.push(FILE)
    })

    return output_list
}

module.exports = read_remote_folder