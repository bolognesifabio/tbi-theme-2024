// const
//     PACKAGE_JSON = require('./package.json'),
//     Clean_Webpack_Plugin = require('clean-webpack-plugin'),
//     Mini_Css_Extract_Plugin = require('mini-css-extract-plugin'),
//     path = require('path')

// module.exports = {
//     entry: ['./assets/src/public/theme-manifest.css'],
//     output: {
//         path: path.resolve(__dirname, 'assets/')
//     },
//     plugins: [
//         new Clean_Webpack_Plugin('assets/css/style.css'),
//         new Mini_Css_Extract_Plugin({
//             filename: `style.css`
//         })
//     ],
//     module: {
//         rules: [
//             {
//                 test: /theme-manifest\.css$/,
//                 use: [Mini_Css_Extract_Plugin.loader, 'css-loader']
//             },
//             {
//                 test: /theme-manifest\.css$/,
//                 loader: 'string-replace-loader',
//                 options: {
//                     search: '[theme-version]',
//                     replace: PACKAGE_JSON.version
//                 }
//             }
//         ]
//     }
// }

const
    IS_MODE_PRODUCTION = process.argv[2] === '--mode=production',
    PACKAGE_JSON = require('./package.json'),
    path = require('path'),
    Clean_Webpack_Plugin = require('clean-webpack-plugin'),
    Mini_Css_Extract_Plugin = require('mini-css-extract-plugin'),
    Git_Revision_Plugin = require('git-revision-webpack-plugin'),
    Write_Json_Plugin = require('write-json-webpack-plugin')

let git_revision = new Git_Revision_Plugin({
    lightweightTags: true
})

const get_config = context => {
    return {
        mode: IS_MODE_PRODUCTION ? 'production' : 'development',
        entry: [
            `./assets/src/${context}/index.js`,
            `./assets/src/${context}/style/critical/index.scss`
        ],
        output: {
            publicPath: `/assets/${context}/`,
            path: path.resolve(__dirname, `assets/${context}`),
            filename: `index.js`,
            chunkFilename: `chunks/[chunkhash].js`
        },
        plugins: [
            new Clean_Webpack_Plugin(`assets/${context}`),
            new Mini_Css_Extract_Plugin({
                filename: `style.css`
            }),
            new Write_Json_Plugin({
                object: {
                    hash: git_revision.commithash()
                },
                filename: 'version.json'
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
                },
                {
                    test: /\.(png|jpg|gif|svg)$/,
                    use: [
                        {
                            loader: 'file-loader',
                            options: {
                                name: `[name].[ext]?ver=`,
                                outputPath: 'img/'
                            }
                        },
                    ],
                },
                {
                    test: /theme-manifest\.css$/,
                    loader: 'string-replace-loader',
                    options: {
                        search: '[theme-version]',
                        replace: PACKAGE_JSON.version,
                    }
                }
            ]
        },
        resolve: {
            alias: {
                vue: IS_MODE_PRODUCTION ? 'vue/dist/vue.min.js' : 'vue/dist/vue.js'
            }
        }
    }
}

module.exports = [
    get_config('admin'),
    get_config('public')
]