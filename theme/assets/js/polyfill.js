// 主にIE11用のプログラムコード。
// 読み込ませないとプログラムがIE11で動かない

if (typeof Object.assign != 'function') {
  Object.assign = function (target) {
    'use strict';
    if (target == null) {
      throw new TypeError('Cannot convert undefined or null to object');
    }

    target = Object(target);
    for (var index = 1; index < arguments.length; index++) {
      var source = arguments[index];
      if (source != null) {
        for (var key in source) {
          if (Object.prototype.hasOwnProperty.call(source, key)) {
            target[key] = source[key];
          }
        }
      }
    }
    return target;
  };
}

if (typeof Array.prototype.forEach != 'function') {
  Array.prototype.forEach = function (callback) {
    for (var i = 0; i < this.length; i++) {
      callback.apply(this, [this[i], i, this]);
    }
  };
}

if (window.NodeList && !NodeList.prototype.forEach) {
  NodeList.prototype.forEach = Array.prototype.forEach;
}

Number.isNaN = Number.isNaN || function (any) {
  return typeof any === 'number' && isNaN(any);
};
