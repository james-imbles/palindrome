const Encore = require('@symfony/webpack-encore')
const path = require('path')

if (!Encore.isRuntimeEnvironmentConfigured()) {
  Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev')
}

Encore
  .setOutputPath('public/build/')
  .setPublicPath('/build')
  .enableVueLoader()
  .addAliases({
    vue$: 'vue/dist/vue.runtime.esm.js',
    '@': path.resolve('assets/js')
  })
  .addEntry('app', './assets/app.js')
  .splitEntryChunks()
  .cleanupOutputBeforeBuild()
  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())
  .enableSingleRuntimeChunk()
  .configureBabel(() => {}, {
    useBuiltIns: 'usage',
    corejs: 3
  })

  .enablePostCssLoader((options) => {
    options.postcssOptions = {
      config: './postcss.config.js'
    }
  });

module.exports = Encore.getWebpackConfig()