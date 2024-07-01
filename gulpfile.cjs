//---------------------------------------
//        INSTALLED NPM PLUGINS       ---
//---------------------------------------
const { src, dest, watch, parallel, series, task } = require("gulp");

//---------------------------------------
//        IMPORT REQUIRE FILES        ---
//---------------------------------------
const paths = require("./frontend/gulp/paths.cjs");
const { startServer, reloadBrowser } = require("./frontend/gulp/server.cjs");

const {
  buildCSS,
  buildJS,
  optimizeImages,
  fonts,
  assets,
} = require("./frontend/gulp/tasks");

//---------------------------------------------
//   SETUP DEVELOPMENT TASK  ( WATCH TASK)  ---
//---------------------------------------------
function dev(done) {
  watch("./**/*.php", reloadBrowser);
  watch(
    `${paths.src.scss}/core.scss`,
    { events: "change" },
    series(buildCSS, reloadBrowser),
  );
  watch(
    `${paths.src.js}/**/*.cjs`,
    { events: "change" },
    series(buildJS, reloadBrowser),
  );
  watch(`${paths.src.img}/**/*.jpg`, optimizeImages);
  watch(`${paths.src.fonts}/**/*`, fonts);
  done();
}

//--------------------------------------
//         DEFINE GULP TASKS         ---
//--------------------------------------
task("css", buildCSS);
task("js", buildJS);
task("imgs", optimizeImages);
task("fonts", fonts);
task("assets", assets);
exports.default = parallel(startServer, series(assets, dev));
