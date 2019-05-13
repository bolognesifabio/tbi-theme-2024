module.exports = {
    entry: [
        './assets/src/admin/style/critical/index.scss',
        './assets/src/public/style/critical/index.scss'
    ],
    output: {
        publicPath: 'assets/css',
        path: path.resolve(__dirname, 'assets/css')
    },
    plugins: [
        new Clean_Webpack_Plugin('assets/css'),
        new Mini_Css_Extract_Plugin({
            filename: `css/style.css?ver=${git_revision.commithash()}`
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
                            name: `[name].[ext]?ver=${git_revision.commithash()}`,
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