const buildCSS = require("./cssTask.cjs");
const buildJS = require("./JSTask.cjs");
const optimizeImages = require("./imgsTask.cjs");

module.exports = { buildCSS, buildJS, optimizeImages };
