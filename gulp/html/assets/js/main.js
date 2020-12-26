/**
 * IE11を判定する
 */
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


/**
 * スマホでhoverの挙動を有効化する
 */
document.addEventListener('touchstart', function () {}, {
  passive: true
});


/**
 * Smooth Scroll
 */
(function ($) {
  $('a[href^="#"]').on('click', function () {
    var speed = 500;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top - $("#siteHeader").innerHeight();

    if ($('body').hasClass('admin-bar')) {
      position -= $('#wpadminbar').innerHeight();
    }

    $("html, body").animate({
      scrollTop: position
    }, speed, "swing");
    return false;
  });
})(jQuery);


/**
 * ページローディング時のSmooth Scroll処理
 */
window.onload = function () {
  if (window.location.hash) {
    ;
    var hash = window.location.hash;

    if (null !== document.querySelector(hash)) {
      // Fire smooth scroll.
      var speed = 500;
      var target = jQuery(hash == "#" || hash == "" ? 'html' : hash);
      var position = target.offset().top - jQuery("#siteHeader").innerHeight();

      if (jQuery('body').hasClass('admin-bar')) {
        position -= jQuery('#wpadminbar').innerHeight();
      }

      jQuery("html, body").animate({
        scrollTop: position
      }, speed, "swing");
      return false;
    }
  }
};


/**
 * Web Font Loader
 */
(function ($) {
  if ($("body").hasClass("notfound")) {
    window.WebFontConfig = {
      google: {
        families: ['Josefin+Sans:wght@400;700', 'Passion+One']
      },
      active: function () {
        sessionStorage.fonts = true;
      }
    };

    (function () {
      var wf = document.createElement('script');
      wf.src = '//ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
      wf.type = 'text/javascript';
      wf.async = true;
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(wf, s);
    })();
  } else {
    window.WebFontConfig = {
      google: {
        families: ['Josefin+Sans:wght@400;700', 'Noto+Serif+JP:wght@400;700']
      },
      active: function () {
        sessionStorage.fonts = true;
      }
    };

    (function () {
      var wf = document.createElement('script');
      wf.src = '//ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
      wf.type = 'text/javascript';
      wf.async = true;
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(wf, s);
    })();
  }
})(jQuery);


/**
 * 100vh用のCSS変数
 */
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
