//---------------------------------------
//        INSTALLED NPM PLUGINS       ---
//---------------------------------------
import { watch, parallel, series, task } from "gulp";

//---------------------------------------
//        IMPORT REQUIRE FILES        ---
//---------------------------------------
import paths from "./frontend/gulp/paths.mjs";

import { startServer, reloadBrowser } from "./frontend/gulp/server.mjs";

import {
  buildCSS,
  buildJS,
  optimizeImages,
  fonts,
  assets,
} from "./frontend/gulp/tasks/index.mjs";

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
    `${paths.src.js}/**/*.js`,
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
task("watch", parallel(startServer, series(assets, dev)));

export default parallel(startServer, series(assets, dev));
