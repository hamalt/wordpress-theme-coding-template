// ライブラリ
import polyfill from './inc/polyfill.js';

// ポリフィル
polyfill();

// 関数群
import detectIEforBodyClass from './inc/detectIE.js';
import smoothScroll from './inc/smoothScroll.js';
import webFont from './inc/webFont.js';
import scrollFire from './inc/scrollFire.js';
import touchDevice from './inc/touchDevice.js';

// IEを判定してbodyタグにclass付与
detectIEforBodyClass();

// スムーススクロール機能
smoothScroll();

// Web Font Loader
webFont();

// Scroll Magicによるスクロール管理
scrollFire();

// タッチデバイス対応（ホバー挙動の再現など）
touchDevice();

/**
 * 100vh用のCSS変数
 */
// TODO: 以下のコードを外部に移行したい
updateViewport();

window.addEventListener('resize', updateViewport);

function updateViewport() {
  var vh = window.innerHeight / 100;
  var vw = window.innerWidth / 100;

  var root = document.documentElement;

  // 各カスタムプロパティに`window.innerHeight / 100`,`window.innerWidth / 100`の値をセット
  root.style.setProperty('--vh', vh + 'px')
  if (vh > vw) {
    root.style.setProperty('--vmax', vh + 'px')
    root.style.setProperty('--vmin', vw + 'px')
  } else {
    root.style.setProperty('--vmax', vw + 'px')
    root.style.setProperty('--vmin', vh + 'px')
  }
};
