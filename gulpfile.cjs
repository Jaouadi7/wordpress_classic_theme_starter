const { watch, parallel } = require("gulp");
const { startServer, reload } = require("./frontend/gulp/server.cjs");

function dev(cb) {
  watch(["./**/*.php", "./**/*.html"], { events: "all" }, function (cb) {
    console.log("watching php & html files");
    reload();
    cb();
  });

  cb();
}
exports.default = parallel(startServer, dev);
