export default function smoothScroll() {
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
})(jQuery);

}
