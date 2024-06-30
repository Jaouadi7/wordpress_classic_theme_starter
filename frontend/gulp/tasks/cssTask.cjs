//---------------------------------------
//        INSTALLED NPM PLUGINS       ---
//---------------------------------------
const { src, dest } = require("gulp");
const sassCompiler = require("sass");
const gulpSass = require("gulp-sass");
const sass = gulpSass(sassCompiler);
const autoPrefixer = require("gulp-autoprefixer");
const sourceMaps = require("gulp-sourcemaps");

//---------------------------------------
//        IMPORT REQUIRE FILES        ---
//---------------------------------------
const paths = require("../paths.cjs");

//--------------------------------------
//         SETUP CSS TASK            ---
//--------------------------------------
function buildCSS(done) {
  src(`${paths.src.scss}/core.scss`)
    .pipe(sourceMaps.init())
    .pipe(sass().on("error", sass.logError))
    .pipe(autoPrefixer({ cascade: false }))
    .pipe(sourceMaps.write("."))
    .pipe(dest(paths.dist.css));
  done();
}

module.exports = buildCSS;
