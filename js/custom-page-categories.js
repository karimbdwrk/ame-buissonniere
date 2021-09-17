function selectCategorie() {
    let hash = window.location.hash
    console.log(hash)
    if (hash == '#bijoux-seuls') {
        console.log('ok hash')
        jQuery('#bijoux-seuls-tab').tab('show')
    }

    function removeHash() { 
        var scrollV, scrollH, loc = window.location;
        if ("pushState" in history)
            history.pushState("", document.title, loc.pathname + loc.search);
        else {
            // Prevent scrolling by storing the page's current scroll offset
            scrollV = document.body.scrollTop;
            scrollH = document.body.scrollLeft;

            loc.hash = "";

            // Restore the scroll offset, should be flicker free
            document.body.scrollTop = scrollV;
            document.body.scrollLeft = scrollH;
        }
    }
    removeHash()
}

if (document.querySelector('body.post-type-archive')) {
    selectCategorie()
}

// jQuery(function(){
//     var hash = window.location.hash;
//     hash && jQuery('ul.nav a[href="' + hash + '"]').tab('show');
  
//     jQuery('.nav-tabs a').click(function (e) {
//         jQuery(this).tab('show');
//         var scrollmem = jQuery('body').scrollTop();
//         window.location.hash = this.hash;
//         jQuery('html,body').scrollTop(scrollmem);
//     });
// });

