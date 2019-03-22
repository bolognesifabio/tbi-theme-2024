const
    read_local_folder = require('./_read-local-folder'),
    LOCAL_FOLDER_FILES = read_local_folder('wp-content/plugins/tbi-plugin')

console.log(`Local folder contains ${LOCAL_FOLDER_FILES.length} files`)


    // let
//     Client = require('@icetee/ftp'),
//     fs = require('fs-extra'),
//     ftp = new Client()





// const CONNECTION_CONFIG = {
//     host: "127.0.0.1",
//     user: "admin",
//     password: "",
//     port: 21
// }
// // let dir = "wp-content/plugins/tbi-plugin"

// ftp.connect(CONNECTION_CONFIG)
//         // ftp.list("test-ftp", (error, files) => {
//         //     files.forEach(file => {
//         //         console.log(file.name)
//         //     })
//         // })

//         // ftp.end()


// // const read_remote_folder = (ftp, directory) => {
// //     return new Promise(resolve => {
// //         ftp.list(directory, (error, resources) => {
// //             resources.forEach(resource => {
// //                 const RESOURCE_PATH = `${directory}/${resource.name}`
                
// //                 console.log(resource.name)
// //                 // resolve(RESOURCE_PATH)
// //             })
// //         })
    
// //         resolve([])
// //     })
// // }

// const read_remote_folder = async (ftp, directory) => {
//     let arr = []
    
//         await ftp.list(directory, (error, resources) => {
//             resources.forEach(resource => {
//                 const RESOURCE_PATH = `${directory}/${resource.name}`

//                 console.log(resource.name)

//                 arr.push(RESOURCE_PATH)
//                 // resolve(RESOURCE_PATH)
//             })
//         })

//         return arr
// }

//             //     if (resource.type === 'd') {
//             //         Promise.all([read_remote_folder(ftp, RESOURCE_PATH)])
//             //             .then(res => {
//             //                 all_files.push(res)
//             //             })
//             //     }
//             //     else all_files.push(RESOURCE_PATH) 
//             // })

//             // console.log(resources.map(resource => {
//             //     const RESOURCE_PATH = `${directory}/${resource.name}`

//             //     if (resource.type === 'd') {
//             //         return read_remote_folder(ftp, RESOURCE_PATH)
//             //     }
//             //     else return RESOURCE_PATH
//             // }))
//             // resolve(Promise.all(resources.map(resource => {
//             //     const RESOURCE_PATH = `${directory}/${resource.name}`

//             //     if (resource.type === 'd') {
//             //         return read_remote_folder(ftp, RESOURCE_PATH)
//             //     }
//             //     else return RESOURCE_PATH
//             // })))
            

// // console.log(read_remote_folder(ftp, "test-ftp"))

// // read_remote_folder(ftp, "test-ftp")
// //     .then(remote_files => {
// //         console.log(remote_files)
// //     })

// read_remote_folder(ftp, "test-ftp")
//     .then(remote_files => {
//         console.log(remote_files)
//     })

// ftp.end()