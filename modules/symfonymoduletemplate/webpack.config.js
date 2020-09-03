const path = require('path'); // Turn absolute urls into relative ones
// const ExtractTextPlugin = require('extract-text-webpack-plugin'); // Allow to separate css from js files

let config = {
    watch: true,
    entry: {
        app: './assets/js/app.js'
    },
    output: {
        path: path.resolve('../../js/admin-dev/symfonymodule-bundle'),
        filename: 'symfonymodule-bundle.js',
        publicPath: '/../../js/symfonymodule-bundle/'
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,
                use: ['babel-loader']
            },
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader']
            },
            {
                test: /\.scss$/,
                use: ['style-loader', 'css-loader', 'sass-loader']
            }
        ]
    },
    plugins: [
        // new ExtractTextPlugin('styles.css')
    ]
};

module.exports = config;
