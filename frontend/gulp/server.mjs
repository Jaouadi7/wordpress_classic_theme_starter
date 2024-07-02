// LOAD .ENV VARIABLES
import dotenv from "dotenv";
dotenv.config();

// SERVER PLUGINS
import browserSync from "browser-sync";
import connect from "gulp-connect-php";

// GET PATHS VARIABLES
import paths from "./paths.mjs";

// SERVER OPTIONS
const options = {
  root: paths.root || "./",
};

// RELOAD BROWSER
function reloadBrowser(done) {
  browserSync.reload();

  done();
}

// SETUP DEV SERVER FOR STATIC FRONTEND ASSETS
function startServer(done) {
  // USING GULP-CONNECT-PHP PLUGIN
  connect.server(
    {
      // SERVER OPTIONS
      base: options.root,
      stdio: "ignore",
      bin: process.env.PHP_BIN,
    },
    function () {
      // USING BROWSERSYNC PLUGIN
      browserSync({
        proxy: "127.0.0.1:8000",
      });
    },
  );

  done();
}

export { startServer, reloadBrowser };
