export default function swiperjs() {
  /**
   * Swiper
   */
  (function ($) {
    const swiper = new Swiper('.swiper-container', {
      slidesPerView: 'auto',
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  })(jQuery);
}
