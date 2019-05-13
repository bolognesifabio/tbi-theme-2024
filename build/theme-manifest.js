const
    PACKAGE_JSON = require('../package.json'),
    Clean_Webpack_Plugin = require('clean-webpack-plugin'),
    Mini_Css_Extract_Plugin = require('mini-css-extract-plugin'),
    path = require('path')

module.exports = {
    entry: ['./assets/src/public/theme-manifest.css'],
    output: {
        path: path.resolve(__dirname)
    },
    plugins: [
        new Clean_Webpack_Plugin('assets/css/style.css'),
        new Mini_Css_Extract_Plugin({
            filename: `style.css`
        })
    ],
    module: {
        rules: [
            {
                test: /theme-manifest\.css$/,
                use: [Mini_Css_Extract_Plugin.loader, 'css-loader']
            },
            {
                test: /theme-manifest\.css$/,
                loader: 'string-replace-loader',
                options: {
                    search: '[theme-version]',
                    replace: PACKAGE_JSON.version
                }
            }
        ]
    }
}