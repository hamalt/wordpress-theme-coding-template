export default function () {
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
}
