require("dotenv").config();
const browserSync = require("browser-sync").create();
const php = require("gulp-connect-php");
const paths = require("./paths.cjs");

// SERVER OPTIONS
const options = {
  port: process.env.PORT || 5000,
  base: paths.production || "./",
  root: paths.root || "./",
};

// RELOAD BROWSER
function reload() {
  browserSync.reload();
}

// SETUP DEV SERVER FOR STATIC FRONTEND ASSETS
function startServer(cb) {
  // USING GULP-CONNECT-PHP PLUGIN
  php.server({
    base: options.root,
    port: options.port,
    keepalive: true,
    stdio: "ignore",
    bin: process.env.PHP_BIN,
    ini: process.env.PHP_INI,
  });

  // USING BROWSERSYNC PLUGIN
  browserSync.init({
    base: options.root,
    proxy: `127.0.0.1:${options.port || 5000}`,
    port: 3000,
  });
  cb();
}

module.exports = { startServer, reload };
