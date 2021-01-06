import ScrollMagic from 'scrollmagic';

export default function () {
  // ScrollMagic Scene [Array]
  var scrollMagicScenes = [];

  /**
   * ScrollMagicのシーンの高さを再計算する関数を格納する変数。
   * 後のSceneインスタンス化後に関数を格納している。
   * 使うときは「 refleshScrollMagicScenes();」の１行を実行する。
   * スライダープログラムやウインドウ幅変更など、Webページの高さが動的に変化したあとに実行させておく。
   */
  var refleshScrollMagicScenes;

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
          $(e.target.triggerElement()).addClass("js-is-inview");
        })
        .on("leave", function (e) {
          // 要素非表示時
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
}
