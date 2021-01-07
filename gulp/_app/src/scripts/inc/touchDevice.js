export default function touchDevice() {
  /**
   * スマホでhoverの挙動を有効化する
   */
  document.addEventListener('touchstart', function () {}, {
    passive: true
  });
}
