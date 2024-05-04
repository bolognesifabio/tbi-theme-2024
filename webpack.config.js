require("@babel/polyfill")

const
    path = require('path'),
    Clean_Webpack_Plugin = require('clean-webpack-plugin'),
    Mini_Css_Extract_Plugin = require('mini-css-extract-plugin'),
    Extract_Text_Plugin = require('extract-text-webpack-plugin'),
    Git_Revision_Plugin = require('git-revision-webpack-plugin'),
    Write_Json_Plugin = require('write-json-webpack-plugin'),
    Vue_Loader_Plugin = require('vue-loader/lib/plugin'),
    PACKAGE_JSON = require('./package.json'),
    CURRENT_BRANCH = process.env.CIRCLE_BRANCH ? process.env.CIRCLE_BRANCH.toUpperCase().split("/")[0] : null,
    ENVIRONMENT_KEY = CURRENT_BRANCH ? process.env[`${CURRENT_BRANCH}_ENVIRONMENT`] || 'DEV02' : 'LCL',
    MODE = ENVIRONMENT_KEY === 'LCL' ? 'development' : process.env[`${ENVIRONMENT_KEY}_MODE`] || 'production',
    IS_MODE_PRODUCTION = MODE === 'production'

let git_revision = new Git_Revision_Plugin({ lightweightTags: true })

module.exports = {
    mode: MODE,
    entry: {
        'admin': ['@babel/polyfill', './assets/src/admin/index.js', './assets/src/admin/style/critical/index.scss'],
        'public': ['@babel/polyfill', './assets/src/public/index.js', './assets/src/public/styles/critical/index.scss'],
        'style': './assets/src/theme-manifest.css',
    },
    output: {
        publicPath: '/wp-content/themes/tbi-theme/',
        path: path.resolve(__dirname),
        filename: 'assets/dist/[name].js',
        chunkFilename: 'assets/dist/chunks/[chunkhash].js'
    },
    plugins: [
        new Extract_Text_Plugin('style.css'),
        new Mini_Css_Extract_Plugin({ filename: 'assets/dist/[name].css' }),
        new Clean_Webpack_Plugin({
            cleanOnceBeforeBuildPatterns: ['assets/dist', 'style.css'],
            cleanAfterEveryBuildPatterns: ['assets/dist/style.js'],
            protectWebpackAssets: false
        }),
        new Write_Json_Plugin({
            object: {
                hash: git_revision.commithash(),
                version: PACKAGE_JSON.version
            },
            filename: 'assets/dist/version.json'
        }),
        new Vue_Loader_Plugin()
    ],
    module: {
        rules: [
            {
                test: /.*.vue$/,
                use: ['vue-loader']
            },
            {
                test: /.*.js$/,
                exclude: /node_modules/,
                use: ['babel-loader']
            },
            {
                test: /\.scss$/,
                exclude: /critical/,
                use: [
                    'style-loader',
                    {
                        loader: 'css-loader',
                        options: {
                            importLoaders: 2
                        }
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            plugins: [ require('autoprefixer')({
                                grid: true
                            }) ]
                        }
                    },
                    'sass-loader'
                ]
            },
            {
                test: /\.scss$/,
                include: /critical/,
                use: [
                    Mini_Css_Extract_Plugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            url: false
                        }
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            plugins: [require('autoprefixer')({
                                grid: true
                            })]
                        }
                    },
                    'sass-loader'
                ]
            },
            {
                test: /theme-manifest\.css$/,
                use: Extract_Text_Plugin.extract({
                    fallback: 'style-loader',
                    use: [
                        'css-loader',
                        {
                            loader: 'string-replace-loader',
                            options: {
                                search: '[theme-version]',
                                replace: PACKAGE_JSON.version
                            }
                        }
                    ]
                })
            },
            {
                test: /\.(png|jpg|gif|svg)$/,
                use: [
                    {
                        loader: 'file-loader'
                    },
                ],
            }
        ]
    },
    resolve: {
        alias: {
            vue: IS_MODE_PRODUCTION ? 'vue/dist/vue.min.js' : 'vue/dist/vue.js'
        }
    }
}
