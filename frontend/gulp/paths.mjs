const root = process.cwd();

const paths = {
  root: root,
  gulp: `${root}/frontend/gulp`,
  development: `${root}/frontend/src`,
  production: `${root}/frontend/dist`,
  build: `${root}/frontend/build`,
  nodeModules: `${root}/node_modules`,
  src: {
    base: `${root}/frontend/src`,
    scss: `${root}/frontend/src/scss`,
    js: `${root}/frontend/src/scripts`,
    img: `${root}/frontend/src/images`,
    fonts: `${root}/frontend/src/fonts`,
  },
  dist: {
    base: `${root}/frontend/dist`,
    css: `${root}/frontend/dist/css`,
    js: `${root}/frontend/dist/js`,
    img: `${root}/frontend/dist/img`,
    fonts: `${root}/frontend/dist/fonts`,
  },
  build: {
    base: `${root}/frontend/build`,
    css: `${root}/frontend/build/css`,
    js: `${root}/frontend/build/js`,
    img: `${root}/frontend/build/img`,
    fonts: `${root}/frontend/build/fonts`,
  },
};

export default paths;
