//---------------------------------------
//        INSTALLED NPM PLUGINS       ---
//---------------------------------------
const { src, dest, watch, parallel, series, task } = require("gulp");

//---------------------------------------
//        IMPORT REQUIRE FILES        ---
//---------------------------------------
const paths = require("./frontend/gulp/paths.cjs");
const { startServer, reloadBrowser } = require("./frontend/gulp/server.cjs");

const { buildCSS, buildJS } = require("./frontend/gulp/tasks");

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
  done();
}

//--------------------------------------
//         DEFINE GULP TASKS         ---
//--------------------------------------
task("css", buildCSS);
task("js", buildJS);
exports.default = parallel(startServer, dev);
