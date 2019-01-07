const path = require('path')
const Clean_Webpack_Plugin = require('clean-webpack-plugin')
const is_mode_production = process.argv[2] === '--mode=production'
const output_hash = Date.now()

module.exports = {
    entry: ['./wp-content/plugins/tbi-plugin/src/index.js'],
    output: {
        publicPath: is_mode_production ? `./wp-content/plugins/tbi-plugin/dist/${output_hash}/` : './wp-content/plugins/tbi-plugin/dist/dev/',
        path: path.resolve(__dirname, is_mode_production ? `wp-content/plugins/tbi-plugin/dist/${output_hash}/` : 'wp-content/plugins/tbi-plugin/dist/dev/'),
        filename: '[name].js',
        chunkFilename: '[chunkhash].js'
    },
    plugins: [
        new Clean_Webpack_Plugin(['wp-content/plugins/tbi-plugin/dist'])
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