// LOAD .ENV VARIABLES
require("dotenv").config();

// SERVER PLUGINS
const browserSync = require("browser-sync");
const connect = require("gulp-connect-php");

// GET PATHS VARIABLES
const paths = require("./paths.cjs");

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

module.exports = { startServer, reloadBrowser };
