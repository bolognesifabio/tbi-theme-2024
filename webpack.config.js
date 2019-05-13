const
    THEME_MANIFEST_CONFIG = require('./build/theme-manifest')


module.exports = THEME_MANIFEST_CONFIG





// const
//     IS_MODE_PRODUCTION = process.argv[2] === '--mode=production',
//     PACKAGE_JSON = require('./package.json'),
//     path = require('path'),
//     Clean_Webpack_Plugin = require('clean-webpack-plugin'),
//     Mini_Css_Extract_Plugin = require('mini-css-extract-plugin'),
//     Git_Revision_Plugin = require('git-revision-webpack-plugin'),
//     Write_Json_Plugin = require('write-json-webpack-plugin')

// let git_revision = new Git_Revision_Plugin({
//     lightweightTags: true
// })

// const get_config = context => {
//     const WP_CONTENT_FOLDER_PATH = `wp-content/${context}s/tbi-${context}/assets`

//     return {
//         mode: IS_MODE_PRODUCTION ? 'production' : 'development',
//         entry: [`./src/${context}/index.js`, `./src/${context}/critical/index.scss`],
//         output: {
//             publicPath: `/${WP_CONTENT_FOLDER_PATH}/`,
//             path: path.resolve(__dirname, WP_CONTENT_FOLDER_PATH),
//             filename: `js/index.js?ver=${git_revision.commithash()}`,
//             chunkFilename: `js/chunks/[chunkhash].js?ver=${git_revision.commithash()}`
//         },
//         plugins: [
//             new Clean_Webpack_Plugin([WP_CONTENT_FOLDER_PATH]),
//             new Mini_Css_Extract_Plugin({
//                 filename: `css/style.css?ver=${git_revision.commithash()}`
//             }),
//             new Write_Json_Plugin({
//                 object: {
//                     hash: git_revision.commithash()
//                 },
//                 filename: 'version.json'
//             })
//         ],
//         module: {
//             rules: [
//                 {
//                     test: /.*.js$/,
//                     exclude: /node_modules/,
//                     use: {
//                         loader: 'babel-loader',
//                         options: {
//                             presets: ['es2015']
//                         }
//                     }
//                 },
//                 {
//                     test: /\.scss$/,
//                     exclude: /critical/,
//                     use: ['style-loader', 'css-loader', 'sass-loader']
//                 },
//                 {
//                     test: /\.scss$/,
//                     include: /critical/,
//                     use: [Mini_Css_Extract_Plugin.loader, 'css-loader', 'sass-loader']
//                 },
//                 {
//                     test: /\.(png|jpg|gif|svg)$/,
//                     use: [
//                         {
//                             loader: 'file-loader',
//                             options: {
//                                 name: `[name].[ext]?ver=${git_revision.commithash()}`,
//                                 outputPath: 'img/'
//                             }
//                         },
//                     ],
//                 },
//                 {
//                     test: /theme-manifest\.css$/,
//                     loader: 'string-replace-loader',
//                     options: {
//                         search: '[theme-version]',
//                         replace: PACKAGE_JSON.version,
//                     }
//                 }
//             ]
//         },
//         resolve: {
//             alias: {
//                 vue: IS_MODE_PRODUCTION ? 'vue/dist/vue.min.js' : 'vue/dist/vue.js'
//             }
//         }
//     }
// }

// module.exports = [
//     get_config('plugin'),
//     get_config('theme')
// ]