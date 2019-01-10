const path = require('path')
const Clean_Webpack_Plugin = require('clean-webpack-plugin')
const is_mode_production = process.argv[2] === '--mode=production'
const output_hash = Date.now()

const get_webpack_configuration_object = (directory_name) => {
    const wp_content_folder_path = `wp-content/${directory_name}s/tbi-${directory_name}/dist`
    
    return {
        entry: [`./src/${directory_name}/index.js`],
        output: {
            publicPath: is_mode_production ? `./${wp_content_folder_path}/${output_hash}/` : `./${wp_content_folder_path}/dev/`,
            path: path.resolve(__dirname, is_mode_production ? `${wp_content_folder_path}/${output_hash}/` : `${wp_content_folder_path}/dev/`),
            filename: '[name].js',
            chunkFilename: '[chunkhash].js'
        },
        plugins: [
            new Clean_Webpack_Plugin([wp_content_folder_path])
        ],
        module: {
            rules: [
                {
                    test: /.*.js$/,
                    exclude: /node_modules/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: ['es2015']
                        }
                    }
                },
                {
                    test: /\.scss$/,
                    use: ['style-loader', 'css-loader', 'sass-loader']
                }
            ]
        },
        resolve: {
            alias: {
                vue: 'vue/dist/vue.js'
            }
        }
    }
}

module.exports = [
    get_webpack_configuration_object('plugin'),
    get_webpack_configuration_object('theme')
]