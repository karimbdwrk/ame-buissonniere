jQuery('.variation-radios input[checked=checked]').addClass('checked')

jQuery(document).on('change', '.variation-radios input', function() {
    jQuery('.variation-radios input:checked').each(function(index, element) {
      var $el = jQuery(element);
      var thisName = $el.attr('name');
      var thisVal  = $el.attr('value');
      jQuery('select[name="'+thisName+'"]').val(thisVal).trigger('change');
    });
});

jQuery(document).on('woocommerce_update_variation_values', function() {
    jQuery('.variation-radios input').each(function(index, element) {
      var $el = jQuery(element);
      var thisName = $el.attr('name');
      var thisVal  = $el.attr('value');
      $el.removeAttr('disabled');
      if(jQuery('select[name="'+thisName+'"] option[value="'+thisVal+'"]').is(':disabled')) {
        $el.prop('disabled', true);
      }
    });
});

jQuery('.variation-radios label[for=attribute_pa_couleur-cordon-framboise]').html('FRAMBOISE<span>fil d\'or</span>')

jQuery('.variation-radios input[name=attribute_pa_color]').on('click', function() {
    console.log('click variation')
    jQuery('.variation-radios input[name=attribute_pa_color]').removeClass('checked')
    jQuery(this).addClass('checked')
})

jQuery('.variation-radios input[name=attribute_pa_size]').on('click', function() {
    console.log('click variation')
    jQuery('.variation-radios input[name=attribute_pa_size]').removeClass('checked')
    jQuery(this).addClass('checked')
})

jQuery('.variation-radios input[name=attribute_pa_couleur-cordon]').on('click', function() {
    console.log('click variation')
    jQuery('.variation-radios input[name=attribute_pa_couleur-cordon]').removeClass('checked')
    jQuery(this).addClass('checked')
})
