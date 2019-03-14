let
    Ftp_Deploy = require('ftp-deploy'),
    ftp_deploy = new Ftp_Deploy(),
    readline = require('readline')

const CONFIG = {
    user: "dev02tchoukballitalia",
    password: "cZjsDU9T4sbC",
    host: "ftp.dev02tchoukballitalia.altervista.org",
    port: 21,
    localRoot: __dirname,
    remoteRoot: '/',
    include: ['wp-content/plugins/tbi-plugin/*/**', 'wp-content/themes/tbi-theme/*/**'],
    forcePasv: true
}

const clear_lines = () => {
    readline.moveCursor(process.stdout, 0, -2)
    readline.clearLine(process.stdout)
    readline.clearLine(process.stdout)
}

const launch_deploy = async () => {
    try {
        clear_lines()
        await ftp_deploy.deploy(CONFIG)
        console.log('Build succeded')
    } catch(error) { console.log(error) }
}

ftp_deploy.on('uploading', data => {
    clear_lines()
    console.log(`Transferring ${data.filename}\n${data.transferredFileCount} / ${data.totalFilesCount} files transferred`)
});

launch_deploy()