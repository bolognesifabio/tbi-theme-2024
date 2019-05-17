export default function(title, error) {
    console.log('\x1b[31m ', title)
    console.log(' ', error)
    console.log('\x1b[0m')
    this.ftp.end()
    process.exit(1)
}