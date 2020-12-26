const ASSET_ROOT = 'src';
const DEST_ROOT = '../html';
const ASSET_DEST_ROOT = `${DEST_ROOT}/assets`;
const THEME_DEST_ROOT = '../../theme';
const THEME_ASSET_DEST_ROOT = `${THEME_DEST_ROOT}/assets`;

export const sass = {
  src: `${ASSET_ROOT}/sass/**/*.scss`,
  ignoreWatchSrc: `${ASSET_ROOT}/sass/_import.scss`,
  ignoreLintSrc: `${ASSET_ROOT}/sass/01_base/vender/**/*.scss`,
  rootFile: `${ASSET_ROOT}/sass/_import.scss`,
  rootSrc: `${ASSET_ROOT}/sass/`,
  dest: `${ASSET_DEST_ROOT}/css`,
  themeDest: `${THEME_ASSET_DEST_ROOT}/css`,
};

export const scripts = {
  srcRoot: `${ASSET_ROOT}/js`,
  src: `${ASSET_ROOT}/js/**/*.js`,
  dest: `${ASSET_DEST_ROOT}/js`,
  babelrc: {
    presets: [
      ['@babel/env', {
        targets: '> 0.25%, not dead'
      }]
    ]
  }
};

export const templates = {
  root: `${ASSET_ROOT}/templates`,
  edges: `${ASSET_ROOT}/templates/**/*.edge`,
  pugs: `${ASSET_ROOT}/templates/**/*.pug`,
  pages: `${ASSET_ROOT}/templates/pages/**/*.edge`,
  data: `${ASSET_ROOT}/templates/data.json`,
  helper: `${ASSET_ROOT}/templates/helper.js`,
  dest: DEST_ROOT
};

export const images = {
  src: `${ASSET_ROOT}/images/**/*.*`,
  ignoreSrc: `${ASSET_ROOT}/images/svg-sprite/**/*.svg`,
  dest: `${ASSET_DEST_ROOT}/images`
};

export const svg = {
  src: `${ASSET_ROOT}/images/svg-sprite/**/*.svg`,
  dest: `${ASSET_DEST_ROOT}/images/svg-sprite`
};

export const isProd = process.env.NODE_ENV === 'production';
