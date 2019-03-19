let
    Ftp_Deploy = require('ftp-deploy'),
    ftp_deploy = new Ftp_Deploy()

const
    HOST = process.argv[2],
    USER = process.argv[3],
    PASSWORD = process.argv[4],
    CONFIG = {
        user: USER,
        password: PASSWORD,
        host: HOST,
        port: 21,
        localRoot: __dirname,
        remoteRoot: '/',
        include: ['wp-content/plugins/tbi-plugin/**/**', 'wp-content/themes/tbi-theme/**/**'],
        forcePasv: true
    }

const launch_deploy = async () => {
    try {
        console.log('Deploy started')
        await ftp_deploy.deploy(CONFIG)
        console.log('Deploy succeded')
    } catch(error) { console.error(error) }
}

launch_deploy()