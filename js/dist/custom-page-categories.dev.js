"use strict";

function selectCategorie() {
  var hash = window.location.hash; // jQuery(hash + '-tab').tab('show')

  console.log('hash', hash);

  if (hash == '#bijoux-seuls' || hash == '#bijoux-seuls#bijoux-seuls') {
    console.log('ok hash');
    jQuery('#bijoux-seuls-tab').tab('show');
  } else if (hash == '#recharges-parfum' || hash == '#recharges-parfum#recharges-parfum') {
    console.log('ok hash');
    jQuery('#recharges-parfum-tab').tab('show');
  }

  function removeHash() {
    var scrollV,
        scrollH,
        loc = window.location;
    if ("pushState" in history) history.pushState("", document.title, loc.pathname + loc.search);else {
      // Prevent scrolling by storing the page's current scroll offset
      scrollV = document.body.scrollTop;
      scrollH = document.body.scrollLeft;
      loc.hash = ""; // Restore the scroll offset, should be flicker free

      document.body.scrollTop = scrollV;
      document.body.scrollLeft = scrollH;
    }
  }

  removeHash();
}

if (document.querySelector('body.page-id-7')) {
  selectCategorie();
} // jQuery(function(){
//     var hash = window.location.hash;
//     hash && jQuery('ul.nav a[href="' + hash + '"]').tab('show');
//     jQuery('.nav-tabs a').click(function (e) {
//         jQuery(this).tab('show');
//         var scrollmem = jQuery('body').scrollTop();
//         window.location.hash = this.hash;
//         jQuery('html,body').scrollTop(scrollmem);
//     });
// });