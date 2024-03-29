import gulp from 'gulp';
import imagemin from 'gulp-imagemin';

import {
  images as config
} from './config';

export function images() {
  return gulp
    .src([`${config.src}`, `!${config.ignoreSrc}`])
    .pipe(imagemin())
    .pipe(gulp.dest(config.dest));
}
