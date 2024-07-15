const root = process.cwd();

const paths = {
  root: root,
  gulp: `${root}/frontend/gulp`,
  development: `${root}/frontend/src`,
  production: `${root}/wp-theme/frontend/dist`,
  build: `${root}/wp-theme/frontend/build`,
  nodeModules: `${root}/node_modules`,
  src: {
    base: `${root}/frontend/src`,
    scss: `${root}/frontend/src/scss`,
    js: `${root}/frontend/src/scripts`,
    img: `${root}/frontend/src/images`,
    fonts: `${root}/frontend/src/fonts`,
  },
  dist: {
    base: `${root}/wp-theme/frontend/dist`,
    css: `${root}/wp-theme/frontend/dist/css`,
    js: `${root}/wp-theme/frontend/dist/js`,
    img: `${root}/wp-theme/frontend/dist/img`,
    fonts: `${root}/wp-theme/frontend/dist/fonts`,
  },
  build: {
    base: `${root}/wp-theme/frontend/build`,
    css: `${root}wp-theme/frontend/build/frontend/css`,
    js: `${root}/wp-theme/frontend/build/js`,
    img: `${root}/wp-theme/build/frontend/img`,
    fonts: `${root}wp-theme/build/frontend/fonts`,
  },
};

export default paths;
