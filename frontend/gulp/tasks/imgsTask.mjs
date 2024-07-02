//---------------------------------------
//        INSTALLED NPM PLUGINS       ---
//---------------------------------------
import { src, dest, lastRun } from "gulp";

import imagemin from "gulp-imagemin";

//---------------------------------------
//        IMPORT REQUIRE FILES        ---
//---------------------------------------
import paths from "../paths.mjs";

//---------------------------------------
//      SETUP OPTIMIZE IMG TASK       ---
//---------------------------------------
const optimizeImages = (done) => {
  src(`${paths.src.img}/**.jpg`)
    .pipe(imagemin(), { since: lastRun(optimizeImages) })
    .pipe(dest(paths.dist.img));
  done();
};

export default optimizeImages;
