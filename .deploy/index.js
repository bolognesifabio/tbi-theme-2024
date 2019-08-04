import handle_error from './_handle-error'
import connect from './_connect'
import read_local_folder from './_read-local-folder'
import make_remote_directories from './_make-remote-directories'
import deploy_package from './_deploy-package'
import read_remote_folder from './_read-remote-folder'
import remove_deprecated from './_remove-deprecated'

const
    CURRENT_BRANCH = process.env.CIRCLE_BRANCH.toUpperCase(),
    ENVIRONMENT_KEY = process.env[`${CURRENT_BRANCH}_ENVIRONMENT`] || 'DEV02'

console.log(CURRENT_BRANCH)    

class FTP_Deploy {
    constructor(connection_data) {
        this.host = connection_data.host
        this.user = connection_data.user
        this.password = connection_data.password
        this.handle_error = handle_error
        this.connect = connect
        this.read_local_folder = read_local_folder
        this.make_remote_directories = make_remote_directories
        this.deploy_package = deploy_package
        this.read_remote_folder = read_remote_folder
        this.remove_deprecated = remove_deprecated

        this.start()
    }

    async start() {
        console.log(`\x1b[33mSTARTING DEPLOY ON ${ENVIRONMENT_KEY}\x1b[0m\n`)
        
        await this.connect()
        this.read_local_folder()
        await this.make_remote_directories()
        await this.deploy_package()
        await this.read_remote_folder()
        await this.remove_deprecated()

        console.log('\x1b[33mDEPLOY SUCCEDED\x1b[0m\n')

        this.ftp.end()
    }
}

new FTP_Deploy({
    host: process.env[`${ENVIRONMENT_KEY}_HOST`],
    user: process.env[`${ENVIRONMENT_KEY}_USER`],
    password: process.env[`${ENVIRONMENT_KEY}_PASS`]
})