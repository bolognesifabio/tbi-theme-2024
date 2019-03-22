const
    Promise_FTP = require('promise-ftp'),
    REMOTE_ROOT_FOLDER = 'test-ftp'

let ftp = new Promise_FTP()

ftp.connect({
    host: "127.0.0.1",
    user: "admin",
    password: "",
    port: 21
})
    .then(() => { return read_folder(ftp, REMOTE_ROOT_FOLDER) })
    .then(result => {
        console.log(result)
        ftp.end()
    }).catch(error => {
        ftp.end()
    })


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