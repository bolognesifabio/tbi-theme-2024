let
    Client = require('@icetee/ftp'),
    fs = require('fs-extra'),
    ftp = new Client()

// const CONNECTION_CONFIG = {
//     host: process.argv[2],
//     user: process.argv[3],
//     password: process.argv[4],
//     port: 21
// }
const CONNECTION_CONFIG = {
    host: "127.0.0.1",
    user: "admin",
    password: "1",
    port: 21
}
let dir = "wp-content/plugins/tbi-plugin"
fs.readdir(dir, (err, files) => {
    files.forEach(file => {
        fs.stat(`${dir}/${file}`, (err, stat) => {
            if (stat && stat.isDirectory()) console.log(`${file} is a directory`)
            else console.log(file)
        })
    })
})

// const launch_deploy = async () => {
//     try {
//         await ftp.connect(CONNECTION_CONFIG)
//         console.log('Connection successed')
//         ftp.list((error, files) => {
//             files.forEach(file => {
//                 console.log(file.name)
//             })
//         })
//         ftp.end()
//     } catch(error) {
//         console.error(error)
//     }
// }

// launch_deploy()

// const
//     HOST = process.argv[2],
//     USER = process.argv[3],
//     PASSWORD = process.argv[4],
//     CONFIG = {
//         user: USER,
//         password: PASSWORD,
//         host: HOST,
//         port: 21,
//         localRoot: __dirname,
//         remoteRoot: '/',
//         include: ['wp-content/plugins/tbi-plugin/**/**', 'wp-content/themes/tbi-theme/**/**'],
//         forcePasv: true
//     }

// const launch_deploy = async () => {
//     try {
//         console.log('Deploy started')
//         await ftp_deploy.deploy(CONFIG)
//         console.log('Deploy succeded')
//     } catch(error) { console.error(error) }
// }

// launch_deploy()