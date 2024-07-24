// LOAD .ENV VARIABLES
import dotenv from "dotenv";
dotenv.config();

// SERVER PLUGINS
import browserSync from "browser-sync";
import connect from "gulp-connect-php";

// RELOAD BROWSER
function reloadBrowser(done) {
  browserSync.reload();

  done();
}

// SETUP DEV SERVER FOR STATIC FRONTEND ASSETS
function startServer(done) {
  // USING GULP-CONNECT-PHP PLUGIN
  connect.server({}, function () {
    // USING BROWSERSYNC PLUGIN
    browserSync({
      proxy: process.env.SITE_URL,
    });
  });

  done();
}

export { startServer, reloadBrowser };
