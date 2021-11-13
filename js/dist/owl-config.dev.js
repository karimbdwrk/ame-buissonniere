"use strict";

jQuery(document).ready(function () {
  console.log('owl-config ok !');
  jQuery('#APCarousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    responsive: {
      0: {
        items: 1
      },
      600: {
        loop: false,
        items: 3
      }
    }
  });
  jQuery('#BoostCarousel').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        loop: false,
        items: 3
      }
    }
  });
  jQuery('#VacancesCarousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    mouseDrag: false,
    responsive: {
      0: {
        items: 1
      },
      600: {
        loop: false,
        items: 3
      }
    }
  });
  jQuery('#boCarousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        loop: false,
        items: 4
      }
    }
  });
  jQuery('#boShopCarousel').owlCarousel({
    loop: true,
    margin: 50,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        loop: false,
        items: 3
      }
    }
  });
  jQuery('.portrait-content .owl-carousel').owlCarousel({
    loop: true,
    margin: 50,
    nav: true,
    mouseDrag: false,
    responsive: {
      0: {
        items: 1
      },
      600: {
        loop: false,
        items: 3
      }
    }
  });
  jQuery('.product-upsell .upsell-list.owl-carousel').owlCarousel({
    loop: true,
    margin: 50,
    nav: false,
    mouseDrag: false,
    responsive: {
      0: {
        items: 1
      },
      600: {
        loop: false,
        items: 3
      }
    }
  }); // jQuery('.woocommerce-product-gallery .flex-control-nav').owlCarousel({
  //     loop:true,
  //     margin:50,
  //     responsive:{
  //         0:{
  //             items:1
  //         },
  //         600:{
  //             items:4
  //         }
  //     }
  // })
  // jQuery('.woocommerce-product-gallery .flex-control-nav').addClass('owl-carousel owl-theme')
  // jQuery('#owlImg').owlCarousel({
  //     loop:true,
  //     margin:10,
  //     nav:true,
  //     items: 1,
  //     mouseDrag: true
  // })
  // jQuery('#owlNavigation').owlCarousel({
  //     loop:true,
  //     margin:10,
  //     nav:true,
  //     items: 4
  // })
});