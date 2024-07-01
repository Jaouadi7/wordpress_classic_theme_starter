//-------------------------------------------
// INSTALLED NPM PLUGINS FOR ASSETS TASK  ---
//-------------------------------------------
//
const { src, dest } = require("gulp");
const merge = require("gulp-merge");
const sassCompiler = require("sass");
const gulpSass = require("gulp-sass");
const sass = gulpSass(sassCompiler);

//---------------------------------------
//        IMPORT REQUIRE FILES        ---
//---------------------------------------
const paths = require("../paths.cjs");

//---------------------------------------
//             ASSETS TASK            ---
//---------------------------------------
function assets(done) {
  // BULMA
  const bulma = src(`${paths.nodeModules}/bulma/bulma.scss`)
    .pipe(sass().on("Error", sass.logError))
    .pipe(dest(`${paths.dist.css}/assets/`));

  // FONTAWESOME
  const lineawesome_css = src(
    `${paths.nodeModules}/line-awesome/dist/line-awesome/css/line-awesome.css`,
  ).pipe(dest(`${paths.dist.fonts}/lineawesome/css`));

  //WEBFONTS DIR
  const webfonts = src(
    `${paths.nodeModules}/line-awesome/dist/line-awesome/fonts/*`,
  ).pipe(dest(`${paths.dist.fonts}/lineawesome/fonts`));

  //HTML5SHIV.JS
  const HTML5shiv = src(
    `${paths.nodeModules}/html5shiv/dist/html5shiv.min.js`,
  ).pipe(dest(`${paths.dist.js}/assets`));
  //RESPOND.JS
  const respond = src(
    `${paths.nodeModules}/respond.js/dest/respond.min.js`,
  ).pipe(dest(`${paths.dist.js}/assets`));

  done();
  return merge(bulma, lineawesome_css, webfonts, HTML5shiv, respond);
}

module.exports = assets;
