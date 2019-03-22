require('events').EventEmitter.defaultMaxListeners = 99

const deploy_package = function (ftp, input_files) {
    return new Promise(resolve => {
        resolve(Promise.all(input_files.map(file => {
            // console.log(file)
            const LOCAL_FILE = file
            
            // let file_path = file.split('/')
            // file_path.splice(-1, 1)

            // const OUTPUT_DIRECTORY = file_path.join('/')

            // console.log(LOCAL_FILE)
            // return ftp.put(file, '/')


            const OUTPUT_DIRECTORY = file.split('/').splice(-1, 1).join('/')

            console.log(LOCAL_FILE, OUTPUT_DIRECTORY)
            return ftp.put(LOCAL_FILE, OUTPUT_DIRECTORY)
        })))
    })
}

module.exports = deploy_package