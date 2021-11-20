"use strict";

window.onload = function (e) {
  var isOpen = false;
  console.log('isOpen ' + isOpen);
  var searchBtn = document.getElementById('searchBtn');

  searchBtn.onclick = function () {
    console.log('search btn clicked !');
    isOpen = !isOpen;
    console.log('isOpen ' + isOpen);
    anime({
      targets: '.dgwt-wcas-search-wrapp',
      height: function height() {
        if (isOpen) {
          return ['0px', '50px'];
        } else {
          return ['50px', '0px'];
        }
      },
      easing: 'easeOutQuart',
      duration: 250
    });

    if (isOpen) {
      document.getElementById('masthead').classList.add('search-open');
      document.getElementById("dgwt-wcas-search-input-1").focus();
    } else {
      document.getElementById('masthead').classList.remove('search-open');
    }
  }; // // const searchInput = document.getElementById('dgwt-wcas-search-input-1')
  // // const resultDiv = document.querySelector('.dgwt-wcas-suggestions-wrapp')
  // // searchInput.addEventListener('keyup', event => {
  // //     console.log('change')
  // //     let suggestions = document.querySelectorAll('.dgwt-wcas-suggestions-wrapp .dgwt-wcas-si img')
  // //     suggestions.forEach(suggestion => {
  // //         let oldLink = suggestion.getAttribute('src')
  // //         let newLink = oldLink.replace('?fit=64%2C64', '')
  // //         suggestion.setAttribute('src', newLink)
  // //     })
  // // });
  // // select the target node
  // var target = document.querySelector('.dgwt-wcas-suggestions-wrapp');
  // // create an observer instance
  // var observer = new MutationObserver(function(mutations) {
  //     mutations.forEach(function(mutation) {
  //         console.log(mutation.type);
  //         let suggestions = document.querySelectorAll('.dgwt-wcas-suggestions-wrapp .dgwt-wcas-si img')
  //         suggestions.forEach(suggestion => {
  //             let oldLink = suggestion.getAttribute('src')
  //             let newLink = oldLink.replace('?fit=64%2C64', '')
  //             suggestion.setAttribute('src', newLink)
  //         })
  //     });    
  // });
  // // configuration of the observer:
  // var config = { attributes: true, childList: true, characterData: true };
  // // pass in the target node, as well as the observer options
  // observer.observe(target, config);
  // // later, you can stop observing
  // // observer.disconnect();

};