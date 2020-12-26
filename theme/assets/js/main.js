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
 * プリローダー
 */
var preloaderObj;

// ロゴアニメーションの実行
if (!isIE && 1024 <= window.innerWidth) {
  // IE以外かつ、PC以上ならアニメーションロゴを表示
  document.getElementById('animLogo').style.display = "block";
  document.getElementById('preloader').classList.add('is-animation');

  preloaderObj = lottie.loadAnimation({
    container: document.getElementById('animLogo'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    // path: '/assets/json/logo-animation-data.json',
    path: '/wp-content/themes/hokuei/assets/json/logo-animation-data.json',
    rendererSettings: {
      className: 'animationLogo'
    }
  });

  // ロゴの中央配置（pxによる絶対配置。SVGアニメーションの崩れ対策）
  function centeredLogo() {
    var logoElem = document.getElementById('preloaderLogo');
    var logoHeight = 120;
    var logoWidth = 102;
    var logoWindowHeight = window.innerHeight;
    var logoWindowWidth = window.innerWidth;
    var sideValue = Math.floor((logoWindowWidth / 2) - (logoWidth / 2));
    var topValue = Math.floor((logoWindowHeight / 2) - (logoHeight / 2));
    logoElem.style.top = topValue + "px";
    logoElem.style.left = sideValue + "px";
  }
  centeredLogo();
  window.addEventListener('resize', centeredLogo);
} else {
  document.getElementById('preloader').classList.add('is-static');
  document.getElementById('staticLoaderLogo').style.display = "block";
}


/**
 * グローバル変数
 */
// スクロールの最大値
var heightLimit;

// 参考
// TODO: https://qiita.com/ksk1015/items/32cd6c1afdad28ba4fb5
function setScrollLimit() {
  heightLimit = document.documentElement.scrollHeight - document.documentElement.clientHeight;
}

// 最初に一度スクロールの最大値を計算しておく
setScrollLimit();

// ScrollMagic Scene [Array]
var scrollMagicScenes = [];

/**
 * ScrollMagicのシーンの高さを再計算する関数を格納する変数。
 * 後のSceneインスタンス化後に関数を格納している。
 * 使うときは「 refleshScrollMagicScenes();」の１行を実行する。
 * スライダープログラムやウインドウ幅変更など、Webページの高さが動的に変化したあとに実行させておく。
 */
var refleshScrollMagicScenes;

// Rellax
var rellax;

// Video JS HLS Config
var overrideNative = true;

// MainVisual Slider
var mainVisualSlider;

// Smooth Scroll
(function ($) {
  $('a[href^="#"]').on('click', function () {
    var speed = 500;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top - $("#siteHeader").innerHeight();

    if ($('body').hasClass('admin-bar')) {
      position -= jQuery('#wpadminbar').innerHeight();
    }

    $("html, body").animate({
      scrollTop: position
    }, speed, "swing");
    return false;
  });
})(jQuery);


/**
 * スクロールアニメーションの管理
 * ScrollMagicで対応
 */
(function ($) {
  // Scroll Magic。主にスクロール時のフェードインアニメーションで使用
  // init controller
  var controller = new ScrollMagic.Controller();

  // すべての[data-scroll]属性が付いている要素が見えたらクラスを付与
  // 参考: https://scrollmagic.io/examples/basic/reveal_on_scroll.html
  $('[data-scroll]').each(function () {
    // クラス名で処理を変更するために値を取得
    var attrClass = $(this).attr("class");

    // トリガーとなるブラウザ下部からの距離（0.9 = 90%）
    var triggerHookValue = 1;

    // トリガーが終了となる要素の上部からの距離
    // 要素の高さを指定することで、要素が見えている間は常にenter状態になる
    var durationValue = $(this).innerHeight();

    // トリガーとなる要素の上部からの距離
    var offsetValue = 0;

    if (attrClass === "worksContents--videoSpacer") {
      // safariなどマイナス値までスクロールできるブラウザ用
      var triggerMargin = 200;

      // 要素の終了時点でトリガーさせる
      triggerHookValue = 0;

      // ページ上部からトリガーさせるためにヘッダーの高さをoffsetに設定
      // 念の為1px分追加
      offsetValue -= $("#siteHeader").innerHeight() + triggerMargin;

      // デュレーションも高さ分追加
      durationValue += $("#siteHeader").innerHeight() + triggerMargin;

      // 管理バーが表示されているときはその高さも計算する
      if ($("body").hasClass("admin-bar")) {
        var wpadminbarHeight = 32;

        if (window.innerWidth <= 782) {
          wpadminbarHeight = 46;
        }

        offsetValue -= wpadminbarHeight;
        durationValue += wpadminbarHeight;
      }
    }

    // ScrollMagic用のシーンを生成
    var scene = new ScrollMagic.Scene({
        triggerElement: this,
        triggerHook: triggerHookValue,
        duration: durationValue,
        offset: offsetValue,
        reverse: true
      })
      .on("enter", function (e) {
        // 要素表示時
        $(e.target.triggerElement()).addClass("is-inview");
      })
      .on("leave", function (e) {
        // 要素非表示時
        // 制作実績ページのVideoSpacerに関してはスクロールによるclass付与をtoggle化
        if ($(e.target.triggerElement()).hasClass("worksContents--videoSpacer")) {
          $(e.target.triggerElement()).removeClass("is-inview");
        }
      })
      // デバッグ時にコメントアウトを解除
      // .addIndicators({
      //   name: attrClass
      // })
      .addTo(controller);

    scrollMagicScenes.push(scene);
  });

  // ScrollMagicのシーンの高さ再計算関数の実行用関数
  // シーンは各々別インスタンスなので、一括で関数を実行させる必要がある
  refleshScrollMagicScenes = function () {
    for (var i = 0; i < scrollMagicScenes.length; i++) {
      scrollMagicScenes[i].refresh();
    }
  }
})(jQuery);


/**
 * Rellax.jsによるパララックス実装
 */
(function ($) {
  // グレーの大文字などのパララックス表示プログラム
  rellax = new Rellax('.rellax', {
    speed: 1.5,
  });
})(jQuery);


/**
 * スクロールの進捗バー
 */
(function ($) {
  // スクロールの進捗バー管理
  function scrollFunc() {
    var $progressBar = $('#scrollProgressBar').find('.scrollProgressBar--progressBar');

    setScrollLimit();
    var scrollY = window.pageYOffset;
    var scrollProgress = (scrollY / heightLimit) * 100;
    $progressBar.css('height', scrollProgress + '%');
  }

  // ブラウザスクロール時に実行
  $(window).on('scroll', function () {
    scrollFunc();
  });

  // ブラウザサイズ変更時に実行
  $(window).on('resize', function () {
    scrollFunc();
  });
})(jQuery);


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
 * LightBoxの実装
 */
(function ($) {
  lightbox.option({
    'fadeDuration': 200,
    'resizeDuration': 200,
    'wrapAround': true
  })
})(jQuery);


/**
 * ページローディング時の処理
 */
window.onload = function () {
  // スクロールマジック、パララックスの高さ再計算
  refleshScrollMagicScenes();
  if (typeof rellax.refresh === 'function') {
    rellax.refresh();
  }
  setScrollLimit();

  // プリローダーの非表示
  var spinner = document.getElementById('preloader');
  spinner.classList.add('is-loaded');
  if ("undefined" !== typeof preloaderObj) {
    setTimeout(function () {
      preloaderObj.destroy();
    }, 550);
  }

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
 * プリローダーの強制表示（5秒経過）
 */
function stopPreloader() {
  jQuery('#preloader').addClass('is-loaded');
}
(function ($) {
  setTimeout('stopPreloader()', 4000);
})(jQuery);

/**
 * グローバルメニュー
 */
(function ($) {
  var $globalMenuParentA = $("#globalMenuList").find('.menu-item-has-children > a');
  $globalMenuParentA.append('<span class="dropdown"></span>');

  $('#globalMenuButton').on('click', function () {
    $('#siteHeaderContainer').toggleClass('is-open');
    $('#globalMenu').toggleClass('is-open');
    $('#brandLogo').toggleClass('is-open');
    $('#fixedBrandLogo').toggleClass('is-open');
    $('#fixedGlobalMenu').toggleClass('is-open');
    $(this).toggleClass('is-open');
    $('body').toggleClass('is-hidden');
  });

  var $dropDownButton = $globalMenuParentA.find('.dropdown');

  $dropDownButton.on('click', function () {
    $("#globalMenuList .menu-item-has-children a").next("ul").stop().slideUp();
    $(this).parent('a').next("ul").stop().slideToggle();
    return false;
  });
})(jQuery);

/**
 * メインビジュアル
 */
(function ($) {
  if ($("#mainVisual").length === 0) return;
  mainVisualSlider = new Swiper('.mainVisual--slider', {
    direction: 'vertical',
    autoHeight: true,
    allowTouchMove: false,
    pagination: {
      el: '.mainVisual--sliderPagination',
      clickable: true,
    },
    on: {
      init: function () {
        refleshScrollMagicScenes();
        rellax.refresh();
        setScrollLimit();
      },
      resize: function () {
        refleshScrollMagicScenes();
        rellax.refresh();
        setScrollLimit();
      },
      observerUpdate: function () {
        refleshScrollMagicScenes();
        rellax.refresh();
        setScrollLimit();
      },
    }
  });

  var options = {
    // aspectRatio: '16:9',
    fill: true,
    muted: true,
    preload: true,
    autoplay: false,
    loop: true,
    controls: false,
    errorDisplay: false,
    html5: {
      vhs: {
        withCredentials: true
      },
      hls: {
        overrideNative: overrideNative
      },
      nativeVideoTracks: !overrideNative,
      nativeAudioTracks: !overrideNative,
      nativeTextTracks: !overrideNative
    }
  };

  // メインビジュアルの1つ目の動画はオートプレイをON
  options.autoplay = true;

  // Video 1
  var mainVisualPlayer1 = videojs('mainVisualVideo1', options, function () {
    refleshScrollMagicScenes();
    rellax.refresh();
    setScrollLimit();
    return false;
  });

  $('#mainVisualSlide1').find('.mainVisual--sliderAudioButton-on').on('click', function () {
    if (true === mainVisualPlayer1.muted()) {
      mainVisualPlayer1.muted(false);
      $(this).addClass('is-active');
      $('#mainVisualSlide1').find('.mainVisual--sliderAudioButton-off').removeClass('is-active');
    }
  });
  $('#mainVisualSlide1').find('.mainVisual--sliderAudioButton-off').on('click', function () {
    if (false === mainVisualPlayer1.muted()) {
      mainVisualPlayer1.muted(true);
      $(this).addClass('is-active');
      $('#mainVisualSlide1').find('.mainVisual--sliderAudioButton-on').removeClass('is-active');
    }
  });

  // メインビジュアルの2つ目の動画はオートプレイをOFF
  options.autoplay = false;
  var mainVisualPlayer2 = videojs('mainVisualVideo2', options, function () {
    refleshScrollMagicScenes();
    rellax.refresh();
    setScrollLimit();
  });

  $('#mainVisualSlide2').find('.mainVisual--sliderAudioButton-on').on('click', function () {
    if (true === mainVisualPlayer2.muted()) {
      mainVisualPlayer2.muted(false);
      $(this).addClass('is-active');
      $('#mainVisualSlide2').find('.mainVisual--sliderAudioButton-off').removeClass('is-active');
    }
  });
  $('#mainVisualSlide2').find('.mainVisual--sliderAudioButton-off').on('click', function () {
    if (false === mainVisualPlayer2.muted()) {
      mainVisualPlayer2.muted(true);
      $(this).addClass('is-active');
      $('#mainVisualSlide2').find('.mainVisual--sliderAudioButton-on').removeClass('is-active');
    }
  });

  // スライド変更時に全動画を停止
  mainVisualSlider.on('transitionStart', function () {
    mainVisualPlayer1.pause();
    mainVisualPlayer2.pause();
  });

  // スライド変更完了時にアクティブな動画を再生
  mainVisualSlider.on('transitionEnd', function () {
    switch (mainVisualSlider.activeIndex) {
      case 0:
        mainVisualPlayer1.play();
        break;
      case 1:
        mainVisualPlayer2.play();
        break;
    }
  });
})(jQuery);

/**
 * Servicesセクション（TOP）
 */
(function ($) {
  var serviceSectionSlider = new Swiper(
    '.servicesSection--slider', {
      pagination: {
        el: '.servicesSection--sliderPagination',
        clickable: true,
        allowTouchMove: true,
      },
      autoplay: true,
      delay: 3000,
      on: {
        init: function () {
          refleshScrollMagicScenes();
          rellax.refresh();
          setScrollLimit();
        },
      }
    }
  );
})(jQuery);

/**
 * Worksセクション（TOP）
 */
(function ($) {
  $('.worksSection--slider').on('init', function (event, slick) {
    refleshScrollMagicScenes();
    rellax.refresh();
    setScrollLimit();
  });

  $('.worksSection--slider').slick({
    centerMode: true,
    centerPadding: '32.25%',
    slidesToShow: 1,
    arrows: true,
    dots: true,
    autoplay: false,
    speed: 800,
    autoplaySpeed: 4000,
    responsive: [{
      breakpoint: 1024,
      settings: {
        centerMode: true,
        centerPadding: '14.66%',
        slidesToShow: 1,
        arrows: true,
        dots: true,
      }
    }]
  });
})(jQuery);

/**
 * Newsセクション（TOP）
 */
(function ($) {
  var $homeNewsThumbnails = $('#homeNewsThumbnails');

  $('#homeNewsList').find('[data-news-item]').on({
    'mouseenter': function () {
      var itemNum = $(this).attr('data-news-item');
      $homeNewsThumbnails.find('li').removeClass('is-active');
      $homeNewsThumbnails.find('li').eq(itemNum).addClass('is-active');
    },
    'mouseleave': function () {}
  })
})(jQuery);

/**
 * Works詳細
 */
(function ($) {
  if (!$("body").hasClass("single-works")) return;

  // ギャラリーのカスタムスクロールバー
  $(window).on("load", function () {
    $(".worksGallery").mCustomScrollbar({
      axis: "x",
      scrollbarPosition: "outside",
      theme: "dark-thin"
    });
  });

  // スクロール時の動画位置調整
  var $videoSpacer = $(".worksContents--videoSpacer");
  var $videoWrapper = $(".worksContents--video");
  var $videoInner = $(".worksContents--videoInner");

  $(window).on('load scroll resize', function () {
    var wrapperHeight = $videoWrapper.innerHeight();

    if (wrapperHeight !== 0) {
      if ($videoSpacer.hasClass("is-inview")) {
        $videoWrapper.removeClass("is-fixed");
        $videoInner.removeClass("is-fixed");
        $videoInner.removeAttr("style");
      } else {
        $videoWrapper.addClass("is-fixed");
        $videoInner.addClass("is-fixed");

        // スクロール量を取得
        var scroll = $(window).scrollTop();

        // ビデオの高さ取得
        var videoHeight = $videoInner.innerHeight();
        var wrapperWidth = $videoWrapper.innerWidth();
        var wrapperLeft = $videoWrapper.offset().left;

        // ビデオの最大移動量を計算
        var limitHeight = wrapperHeight - videoHeight;

        if (scroll > limitHeight) {
          $videoInner.addClass("is-bottom");
          $videoInner.removeAttr("style");
        } else {
          $videoInner.removeClass("is-bottom");
          $videoInner.css({
            "width": wrapperWidth,
            "left": wrapperLeft
          });
        }
      }
    }
  });
})(jQuery);

/**
 * Memberページ
 */
(function ($) {
  if (!$("body").hasClass("page-template-member")) return;

  var memberGallerySlider = new Swiper('.memberGallery--slider', {
    slidesPerView: 1,
    spaceBetween: 0,
    breakpoints: {
      768: {
        slidesPerView: 2
      }
    },
    on: {
      init: function () {
        refleshScrollMagicScenes();
        setScrollLimit();
      },
      resize: function () {
        refleshScrollMagicScenes();
        setScrollLimit();
      },
      observerUpdate: function () {
        refleshScrollMagicScenes();
        setScrollLimit();
      },
    }
  });
})(jQuery);

/**
 * メインビジュアルの高さを設定
 */
function setMainVisualHeight() {
  // メインビジュアルが存在するなら
  var mainVisualElm = document.getElementById('mainVisual');
  if (null !== mainVisualElm) {
    var vh = window.innerHeight / 100;
    var root = document.documentElement;
    root.style.setProperty('--phoneVh', vh + 'px');
  }
}
setMainVisualHeight();

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

  // メインビジュアルスライダーが存在するならupdate関数を実行
  if (typeof mainVisualSlider === 'object') {
    mainVisualSlider.update();
  }

  // Scroll Magicのシーンの高さを再計算
  refleshScrollMagicScenes();

  // Rellaxの関数が存在するならrefresh関数を実行
  if (typeof rellax.refresh === 'function') {
    rellax.refresh();
  }

  setScrollLimit();
};

(function ($) {
  // About Us Video
  if ($("#aboutPageVideo").length === 0) return;
  var aboutPageVideo = videojs('#aboutPageVideo', {
    aspectRatio: '16:9',
    fill: true,
    muted: true,
    preload: true,
    autoplay: true,
    loop: true,
    controls: false,
    html5: {
      vhs: {
        withCredentials: true
      },
      hls: {
        overrideNative: overrideNative
      },
      nativeVideoTracks: !overrideNative,
      nativeAudioTracks: !overrideNative,
      nativeTextTracks: !overrideNative
    }
  }, function () {
    refleshScrollMagicScenes();

    // Rellaxの関数が存在するならrefresh関数を実行
    if (typeof rellax.refresh === 'function') {
      rellax.refresh();
    }

    setScrollLimit();
  });
})(jQuery);
