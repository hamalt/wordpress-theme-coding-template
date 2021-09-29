export default function mainVisual() {
/**
 * Smooth Scroll
 */
  (function ($) {
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
          withCredentials: true,
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
  })(jQuery);

}
