import gulp from 'gulp';
import gulpSass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import cleancss from 'gulp-clean-css';
import gcmq from 'gulp-group-css-media-queries';
import csscomb from 'gulp-csscomb';
import autoprefixer from 'gulp-autoprefixer';
import plumber from 'gulp-plumber';
import gulpStylelint from 'gulp-stylelint';
import inject from 'gulp-inject';
import changed from 'gulp-changed-in-place';

import {
  sass as config,
  isProd
} from './config';

/**
 * Import Sass partial file.
 */
export function sassInject() {
  const target = gulp.src(config.rootFile);

  return target
    .pipe(inject(gulp.src([`${config.rootSrc}/01_base/**/_*.scss`, `!${config.rootSrc}/01_base/vender/**/_*.scss`, `!${config.rootSrc}/01_base/_setting/**/_*.scss`], {
      read: false
    }), {
      relative: true,
      starttag: '// base:inject',
      endtag: '// endinject'
    }))
    .pipe(inject(gulp.src([`${config.rootSrc}/02_frame/**/_*.scss`], {
      read: false
    }), {
      relative: true,
      starttag: '// frame:inject',
      endtag: '// endinject'
    }))
    .pipe(inject(gulp.src([`${config.rootSrc}/03_contents/**/_*.scss`], {
      read: false
    }), {
      relative: true,
      starttag: '// contents:inject',
      endtag: '// endinject'
    }))
    .pipe(inject(gulp.src([`${config.rootSrc}/04_pages/**/_*.scss`], {
      read: false
    }), {
      relative: true,
      starttag: '// pages:inject',
      endtag: '// endinject'
    }))
    .pipe(gulp.dest(config.rootSrc));
}

/**
 * SCSS -> CSS
 */
export function sass() {
  return gulp
    .src(config.src)
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(gulpSass().on('error', gulpSass.logError))
    // .pipe(gcmq())
    // .pipe(autoprefixer())
    // .pipe(csscomb())
    .pipe(cleancss())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(config.dest))
    .pipe(gulp.dest(config.themeDest));
}

/**
 * Stylelint
 */
export function stylelint() {
  return gulp
    .src([config.src, `!${config.ignoreLintSrc}`])
    .pipe(changed({
      firstPass: true
    }))
    .pipe(gulpStylelint({
      failAfterError: isProd,
      reporters: [
        {formatter: 'string', console: true}
      ],
      fix: true,
    }))
    .pipe(gulp.dest(config.rootSrc));
}

export const styles = gulp.series(sassInject, stylelint, sass);
