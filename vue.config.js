var path = require('path');
// @see https://cli.vuejs.org/config/#global-cli-config
module.exports = {
  outputDir: 'public/dist',
  lintOnSave: process.env.NODE_ENV !== 'production',
  configureWebpack: {
    entry: {
      app: './app/App/src/main.js'
    },
    resolve: {
      alias: {
        '@': __dirname + '/app'
      }
    }
  },
  devServer: {
    overlay: {
      warnings: true,
      errors: true
    },
    proxy: {
      '/api': {
        target: 'http://localhost:8443',
        ws: true,
        changeOrigin: true
      }
    }
  },
  runtimeCompiler: false,
  transpileDependencies: []
}
