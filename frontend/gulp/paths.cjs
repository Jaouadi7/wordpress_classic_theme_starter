const paths = {
  root: "./",
  development: "./frontend/src",
  production: "./frontend/dist",
  nodeModules: "./node_modules",
  online: "./build",
  src: {
    base: "./frontend/src",
    scss: "./frontend/src/scss",
    js: "./frontend/src/js",
    img: "./frontend/src/images",
    fonts: "./frontend/src/fonts",
  },
  dist: {
    base: "./frontend/dist",
    css: "./frontend/dist/css",
    js: "./frontend/dist/js",
    img: "./frontend/dist/img",
    fonts: "./frontend/dist/fonts",
  },
  build: {
    base: "./build",
    css: "./build/frontend/css",
    js: "./build/frontend/js",
    img: "./build/frontend/img",
    fonts: "./build/frontend/fonts",
  },
};

module.exports = paths;
