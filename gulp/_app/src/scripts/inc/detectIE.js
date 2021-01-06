/**
 * IE11を判定する
 */
export default function detectIEforBodyClass() {
  // UserAgent を取得し、全て小文字にする.
  var ua = window.navigator.userAgent.toLowerCase();

  // Internet Explorer であるかを判定する.
  var isIE = (ua.indexOf('msie') >= 0 || ua.indexOf('trident') >= 0);

  // もしIEの場合は、
  if (isIE) {

    // IEのバージョンを、正規表現で取得する.
    var array = /(msie|rv:?)\s?([\d\.]+)/.exec(ua);
    var version = (array) ? array[2] : '';

    // バージョンを整数の形式にする（11.0 -> 11）
    version = version.split('.')[0];

    // バージョン関係なくIE用のCSSを追加
    window.document.body.classList.add('ie');

    // IE11であるかを判定する.
    if (version === '11') {
      // body タグに「ie11」クラスを追加する.
      window.document.body.classList.add('ie11');
    }
  }
}
