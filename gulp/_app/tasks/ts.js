import gulp from 'gulp';
import gulpTs from 'gulp-typescript';
import plumber from 'gulp-plumber';

import { ts as config, isProd } from './config';

const tsProject = gulpTs.createProject('tsconfig.json');

export function typeScript() {
  return tsProject
    .src()
    .pipe(plumber())
    .pipe(tsProject())
    .js.pipe(gulp.dest(config.dest));
}

export const ts = gulp.series(typeScript);
