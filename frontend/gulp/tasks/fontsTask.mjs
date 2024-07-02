//---------------------------------------
// INSTALLED NPM PLUGINS FOR FONT TASK --
//---------------------------------------
import { src, dest, lastRun } from "gulp";

//---------------------------------------
//        IMPORT REQUIRE FILES        ---
//---------------------------------------
import paths from "../paths.mjs";

//---------------------------------------
//          SETUP FONTS TASK          ---
//---------------------------------------

const fonts = (done) => {
  src(`${paths.src.fonts}/**/*`, { since: lastRun(fonts) }).pipe(
    dest(paths.dist.fonts),
  );
  done();
};

export default fonts;
