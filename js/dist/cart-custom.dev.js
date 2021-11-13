"use strict";

var cartBtn = document.getElementById('cartBtn');
cartBtn.addEventListener('click', function () {
  console.log('click cart');
  document.querySelector('.xoo-wsc-basket').click();
});