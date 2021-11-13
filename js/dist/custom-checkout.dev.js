"use strict";

function getPlaceholder() {
  var checkoutForm = document.querySelector('.woocommerce .woocommerce-checkout');
  document.getElementById('billing_first_name').setAttribute('placeholder', 'Prénom');
  document.getElementById('billing_last_name').setAttribute('placeholder', 'Nom');
  document.getElementById('billing_company').setAttribute('placeholder', 'Entreprise');
  document.getElementById('billing_postcode').setAttribute('placeholder', 'Code Postal');
  document.getElementById('billing_city').setAttribute('placeholder', 'Ville');
  document.getElementById('billing_state').setAttribute('placeholder', 'Région');
  document.getElementById('billing_phone').setAttribute('placeholder', 'Téléphone');
  document.getElementById('billing_email').setAttribute('placeholder', 'Email');
  document.getElementById('shipping_first_name').setAttribute('placeholder', 'Prénom');
  document.getElementById('shipping_last_name').setAttribute('placeholder', 'Nom');
  document.getElementById('shipping_company').setAttribute('placeholder', 'Entreprise');
  document.getElementById('shipping_postcode').setAttribute('placeholder', 'Code Postal');
  document.getElementById('shipping_city').setAttribute('placeholder', 'Ville');
}

if (document.getElementById('checkoutPage')) {
  getPlaceholder();
}

if (document.querySelector('body.logged-in') == null) {
  document.getElementById('username').setAttribute('placeholder', 'EMAIL');
  document.getElementById('password').setAttribute('placeholder', 'MOT DE PASSE');
}