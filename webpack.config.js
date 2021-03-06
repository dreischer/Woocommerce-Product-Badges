const path = require('path')

module.exports = {
  entry: {
    'front-end': './js/front-end/index.js',
    'back-end': './js/back-end/index.js'
  },
  output: {
    path: path.join(__dirname, 'dist/woocommerce-product-badges/js'),
    filename: '[name].js'
  },
  devtool: 'source-map',
  module: {
    rules: [
      {
        test: /\.jsx?$/,
        exclude: [/node_modules/],
        loader: 'buble-loader',
        options: {
          jsx: 'React.h',
          objectAssign: 'Object.assign'
        }
      },
      {
        test: /\.css$/,
        loader: 'style-loader!css-loader'
      }
    ]
  }
}
