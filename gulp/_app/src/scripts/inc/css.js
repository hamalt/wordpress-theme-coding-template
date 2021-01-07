/**
 * 100vh用のCSS変数
 */
// TODO: 以下のコードが動くように対応する
// export default function detectIEforBodyClass() {
//   window.addEventListener('resize', updateViewport);

//   function updateViewport() {
//     var vh = window.innerHeight / 100;
//     var vw = window.innerWidth / 100;

//     var root = document.documentElement;

//     // 各カスタムプロパティに`window.innerHeight / 100`,`window.innerWidth / 100`の値をセット
//     root.style.setProperty('--vh', vh + 'px')
//     if (vh > vw) {
//       root.style.setProperty('--vmax', vh + 'px')
//       root.style.setProperty('--vmin', vw + 'px')
//     } else {
//       root.style.setProperty('--vmax', vw + 'px')
//       root.style.setProperty('--vmin', vh + 'px')
//     }
//   };
// }
// updateViewport();
