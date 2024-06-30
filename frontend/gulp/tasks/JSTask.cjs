//---------------------------------------
//  INSTALLED NPM PLUGINS FOR JS TASK ---
//---------------------------------------
const { dest } = require("gulp");
const browserify = require("browserify");
const babelify = require("babelify");
const source = require("vinyl-source-stream");

//---------------------------------------
//        IMPORT REQUIRE FILES        ---
//---------------------------------------
const paths = require("../paths.cjs");

//---------------------------------------
//         SETUP JS TASK              ---
//---------------------------------------

const buildJS = (done) => {
  browserify({
    entries: [`${paths.src.js}/app.cjs`],
    transform: [babelify.configure({ presets: ["@babel/preset-env"] })],
  })
    .bundle()
    .pipe(source("app.bundle.js"))
    .pipe(dest(paths.dist.js));
  done();
};

module.exports = buildJS;
