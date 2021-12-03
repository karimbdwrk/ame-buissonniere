"use strict";

console.log('tuto-page-js ok');
var play = false;
document.querySelector('#play').addEventListener('click', function () {
  console.log('click play/pause');

  if (play == false) {
    document.querySelector('video').play();
    document.querySelector('#play').innerHTML = '<i class="fas fa-pause"></i>';
    play = true;
  } else {
    document.querySelector('video').pause();
    document.querySelector('#play').innerHTML = '<i class="fas fa-play"></i>';
    play = false;
  }
});