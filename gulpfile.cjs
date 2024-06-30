//---------------------------------------
//        INSTALLED NPM PLUGINS       ---
//---------------------------------------
const { src, dest, watch, parallel, series, task } = require("gulp");

//---------------------------------------
//        IMPORT REQUIRE FILES        ---
//---------------------------------------
const paths = require("./frontend/gulp/paths.cjs");
const { startServer, reloadBrowser } = require("./frontend/gulp/server.cjs");
const buildCSS = require("./frontend/gulp/tasks/cssTask.cjs");

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
  done();
}

//--------------------------------------
//         DEFINE GULP TASKS         ---
//--------------------------------------
task("css", buildCSS);
exports.default = parallel(startServer, dev);
