//---------------------------------------
//        INSTALLED NPM PLUGINS       ---
//---------------------------------------

import { src, dest } from "gulp";
import * as sassCompiler from "sass";
import gulpSass from "gulp-sass";
const sass = gulpSass(sassCompiler);
import autoPrefixer from "gulp-autoprefixer";
import sourceMaps from "gulp-sourcemaps";

//---------------------------------------
//        IMPORT REQUIRE FILES        ---
//---------------------------------------
import paths from "../paths.mjs";

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

export default buildCSS;
