//---------------------------------------
//        INSTALLED NPM PLUGINS       ---
//---------------------------------------
const { src, dest, lastRun } = require("gulp");
// TODO: THE PLUGIN REQUIRE USE IMPORT [ ecmascript ] INSTEAD OF REQUIRE [ CommonJS]
// NOTE: I WILL SWITCH TO USING EMCA INSTEAD OF CJS
// const imagemin = require("gulp-imagemin");
const imagemin = require("gulp-image");

//---------------------------------------
//        IMPORT REQUIRE FILES        ---
//---------------------------------------
const paths = require("../paths.cjs");

//---------------------------------------
//      SETUP OPTIMIZE IMG TASK       ---
//---------------------------------------
const optimizeImages = (done) => {
  src(`${paths.src.img}/**.jpg`)
    .pipe(imagemin(), { since: lastRun(optimizeImages) })
    .pipe(dest(paths.dist.img));
  done();
};

module.exports = optimizeImages;
