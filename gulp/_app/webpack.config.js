import { scripts as config } from './tasks/config';
const path = require('path');

module.exports = {
  mode: process.env.NODE_ENV ? 'production' : 'development',
  entry: {
    app: `./${config.srcRoot}/main.js`
  },
  output: {
    filename: 'main.min.js',
  },
  resolve: {
    extensions: ['*', '.js', '.jsx', '.json'],
    modules: [path.resolve('./node_modules')],
  },
  // 以下1行の設定でIE11に対応
  target: ['es5'],
  optimization: {
    minimize: false
  },
  devtool: 'source-map',
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
        }
      }
    ]
  },
};
