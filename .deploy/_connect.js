import Promise_FTP from 'promise-ftp'
import { EventEmitter } from 'events'

export default async function() {
    EventEmitter.defaultMaxListeners = 999
    
    this.ftp = new Promise_FTP()

    console.log('- Connecting to the server...')
    
    try {
        await this.ftp.connect({
            host: this.host,
            user: this.user,
            password: this.password,
            port: 21,
            forcePasv: true,
            keepalive: 10000,
            pasvTimeout: 120000,
            autoReconnect: true
        })

        console.log('\x1b[32m ', 'Connection succeded.', '\x1b[0m\n')
    } catch(error) { this.handle_error('Error connecting to the server.', error) }
}
