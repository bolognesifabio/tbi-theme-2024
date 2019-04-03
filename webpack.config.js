const
    IS_MODE_PRODUCTION = process.argv[2] === '--mode=production',
    OUTPUT_DIRECTORY = IS_MODE_PRODUCTION ? String(Date.now()) : 'dev',
    path = require('path'),
    Clean_Webpack_Plugin = require('clean-webpack-plugin'),
    Mini_Css_Extract_Plugin = require('mini-css-extract-plugin')

const get_config = (context, output_directory) => {
    const WP_CONTENT_FOLDER_PATH = `wp-content/${context}s/tbi-${context}/dist`

    return {
        entry: [`./src/${context}/index.js`, `./src/${context}/critical/index.scss`],
        output: {
            publicPath: `/${WP_CONTENT_FOLDER_PATH}/${output_directory}/`,
            path: path.resolve(__dirname, WP_CONTENT_FOLDER_PATH, output_directory),
            filename: '[name].js',
            chunkFilename: '[chunkhash].js'
        },
        plugins: [
            new Clean_Webpack_Plugin([WP_CONTENT_FOLDER_PATH]),
            new Mini_Css_Extract_Plugin({
                filename: 'critical.css'
            })
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
                    exclude: /critical/,
                    use: ['style-loader', 'css-loader', 'sass-loader']
                },
                {
                    test: /\.scss$/,
                    include: /critical/,
                    use: [Mini_Css_Extract_Plugin.loader, 'css-loader', 'sass-loader']
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
    get_config('plugin', OUTPUT_DIRECTORY),
    get_config('theme', OUTPUT_DIRECTORY)
]