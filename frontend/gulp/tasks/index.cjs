const buildCSS = require("./cssTask.cjs");
const buildJS = require("./JSTask.cjs");
const optimizeImages = require("./imgsTask.cjs");
const fonts = require("./fontsTask.cjs");

module.exports = { buildCSS, buildJS, optimizeImages, fonts };
