const path = require('path');
const webpack = require('webpack');

module.exports = {
  entry: {
    libs: './src/libs.js',
    main: './src/main.js'
  },
  output: {
    filename: '../public/bundles/libscripts.bundle.js',
    path: path.resolve(__dirname, 'public', 'bundles')
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      }
    ]
  },
  plugins: [
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery'
    })
  ]
};
