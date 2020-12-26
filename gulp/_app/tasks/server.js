import browserSync from 'browser-sync';

import {
  templates as config
} from './config';

const server = browserSync.create();

/**
 * 開発用サーバ再起動
 */
export function reload(cb) {
  server.reload();
  cb();
}

/**
 * 開発用サーバ起動
 */
export function serve(cb) {
  server.init({
    server: {
      baseDir: config.dest
    }
  });
  cb();
}
