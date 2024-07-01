//---------------------------------------
// INSTALLED NPM PLUGINS FOR FONT TASK --
//---------------------------------------
const { src, dest, lastRun } = require("gulp");

//---------------------------------------
//        IMPORT REQUIRE FILES        ---
//---------------------------------------
const paths = require("../paths.cjs");
//---------------------------------------
//          SETUP FONTS TASK          ---
//---------------------------------------

const fonts = (done) => {
  src(`${paths.src.fonts}/**/*`, { since: lastRun(fonts) }).pipe(
    dest(paths.dist.fonts),
  );
  done();
};

module.exports = fonts;
