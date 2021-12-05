"use strict";

jQuery('.variation-radios input[checked=checked]').addClass('checked');
jQuery(document).on('change', '.variation-radios input', function () {
  jQuery('.variation-radios input:checked').each(function (index, element) {
    var $el = jQuery(element);
    var thisName = $el.attr('name');
    var thisVal = $el.attr('value');
    jQuery('select[name="' + thisName + '"]').val(thisVal).trigger('change');
  });
});
jQuery(document).on('woocommerce_update_variation_values', function () {
  jQuery('.variation-radios input').each(function (index, element) {
    var $el = jQuery(element);
    var thisName = $el.attr('name');
    var thisVal = $el.attr('value');
    $el.removeAttr('disabled');

    if (jQuery('select[name="' + thisName + '"] option[value="' + thisVal + '"]').is(':disabled')) {
      $el.prop('disabled', true);
    }
  });
});
jQuery('.variation-radios label[for=attribute_pa_couleur-cordon-framboise]').html('FRAMBOISE<span>fil d\'or</span>');
jQuery('.variation-radios label[for=attribute_pa_couleur-cordon-corail-boheme-fil-dor]').html('CORAIL BOHÈME<span>fil d\'or</span>');
jQuery('.variation-radios label[for=attribute_pa_couleur-cordon-orange-soleil-fil-dor]').html('ORANGE SOLEIL<span>fil d\'or</span>');
jQuery('.variation-radios input[name=attribute_pa_color]').on('click', function () {
  console.log('click variation');
  jQuery('.variation-radios input[name=attribute_pa_color]').removeClass('checked');
  jQuery(this).addClass('checked');
});
jQuery('.variation-radios input[name=attribute_pa_size]').on('click', function () {
  console.log('click variation');
  jQuery('.variation-radios input[name=attribute_pa_size]').removeClass('checked');
  jQuery(this).addClass('checked');
});
jQuery('.variation-radios input[name=attribute_pa_couleur-cordon]').on('click', function () {
  console.log('click variation');
  jQuery('.variation-radios input[name=attribute_pa_couleur-cordon]').removeClass('checked');
  jQuery(this).addClass('checked');
}); // jQuery(document).ready(function() {
//   function owlCarouselProductPage() {
//     const imgPrincipale = document.querySelectorAll('.woocommerce-product-gallery .flex-viewport figure > div a img')
//     const imgNav = document.querySelectorAll('.woocommerce-product-gallery .flex-control-nav li')
//     const cible = document.getElementById('owlImg')
//     const cible2 = document.getElementById('owlNavigation')
//     console.log(imgPrincipale)
//     for (img of imgPrincipale) {
//       let imgSrc = img.getAttribute('src')
//       console.log(imgSrc)
//       let item = document.createElement('div')
//       item.classList.add('item')
//       let imgT = document.createElement('img')
//       imgT.setAttribute('src', imgSrc)
//       item.append(imgT)
//       cible.append(item)
//     }
//     for (img of imgNav) {
//       let content = img.innerHTML
//       let item = document.createElement('div')
//       item.classList.add('item')
//       item.innerHTML = content
//       cible2.append(item)
//     }
//   }
//   owlCarouselProductPage()
// })

jQuery(document).ready(function () {
  function arrowsCarousel() {
    var nbr = document.querySelectorAll('.flex-control-nav > li').length;
    var topBtn = document.getElementById('scrollUp');
    var bottomBtn = document.getElementById('scrollDown');
    var i = 1;
    var y;
    topBtn.addEventListener('click', function () {
      console.log(nbr);

      if (i > 1) {
        console.log('y', y);
        var x = y - i * 145 + 145;
        document.querySelector('.flex-control-nav').scroll(0, -x);
        i--;
        console.log(i, x);
      }
    });
    bottomBtn.addEventListener('click', function () {
      console.log(nbr);

      if (i < nbr) {
        var x = i * 145;
        y = x;
        document.querySelector('.flex-control-nav').scroll(0, x);
        i++;
        console.log(i, x);
      }
    });
  }

  if (document.querySelector('body.single-product')) {
    arrowsCarousel();
  }
});