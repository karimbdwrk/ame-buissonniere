"use strict";

if (document.querySelector('body.page-id-1301')) {
  var play = false;
  document.querySelector('#play').addEventListener('click', function () {
    if (play == false) {
      document.querySelector('.d-sm-flex video').play();
      document.querySelector('#play').innerHTML = '<i class="fas fa-pause"></i>';
      play = true;
    } else {
      document.querySelector('.d-sm-flex video').pause();
      document.querySelector('#play').innerHTML = '<i class="fas fa-play"></i>';
      play = false;
    }
  });
} // For HOMEPAGE 


if (document.querySelector('body.home')) {
  var _play = false;
  document.querySelector('#play').addEventListener('click', function () {
    if (_play == false) {
      document.querySelector('#promenade .d-sm-flex video').play();
      document.querySelector('#play').innerHTML = '<i class="fas fa-pause"></i>';
      _play = true;
    } else {
      document.querySelector('#promenade .d-sm-flex video').pause();
      document.querySelector('#play').innerHTML = '<i class="fas fa-play"></i>';
      _play = false;
    }
  });
}