'use strict';

function getSortedNumber(n, m) {
  let array = [];
  for (let i = 1; i <= n; i++) {
    array.push(i);
  }
  array.sort();
  return array[m - 1];
}

