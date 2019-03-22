const
    Promise_FTP = require('promise-ftp')

require('events').EventEmitter.defaultMaxListeners = 25

const read_remote_folder = function(directory) {
    return new Promise(resolve => {
        let ftp = new Promise_FTP()
    
        ftp.connect({
            host: "127.0.0.1",
            user: "admin",
            password: "",
            port: 21
        })
            .then(() => { return read_folder(ftp, directory) })
            .then(result => {
                let output = flatten_files_list(result)
                ftp.end()
                resolve(output)
            }).catch(error => {
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
    
    Object.values(files_list).forEach(file => {
        if (typeof file === "object") output_list.push(...flatten_files_list(file))
        else output_list.push(file)
    })

    return output_list
}

module.exports = read_remote_folder