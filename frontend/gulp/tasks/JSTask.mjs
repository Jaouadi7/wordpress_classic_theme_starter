//---------------------------------------
//  INSTALLED NPM PLUGINS FOR JS TASK ---
//---------------------------------------
import { dest } from "gulp";
import browserify from "browserify";
import babelify from "babelify";
import source from "vinyl-source-stream";

//---------------------------------------
//        IMPORT REQUIRE FILES        ---
//---------------------------------------
import paths from "../paths.mjs";

//---------------------------------------
//         SETUP JS TASK              ---
//---------------------------------------
const buildJS = (done) => {
  browserify({
    entries: [`${paths.src.js}/app.js`],
    transform: [babelify.configure({ presets: ["@babel/preset-env"] })],
  })
    .bundle()
    .pipe(source("app.bundle.js"))
    .pipe(dest(paths.dist.js));
  done();
};

export default buildJS;
