module.exports = {
    entry: "./assets/app.js",
    output: {
        path: __dirname + '/public/js/',
        filename: "bundle.js"
    },
    module: {
        loaders: [
            {
                test: /\.html$/,
                loader: 'html-loader',
                query: {
                    attrs: false
                }
            },
            { test: /\.css$/, loader: "style!css" }
        ]
    }
};