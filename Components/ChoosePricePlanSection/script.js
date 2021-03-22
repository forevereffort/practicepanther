jQuery(document).ready(function () {
  jQuery('.price-method-switch').click(function () {
    if (jQuery(this).hasClass('right')) {
      jQuery(this).removeClass('right')
      jQuery('.price-method[data-attr=monthly]').addClass('choosed')
      jQuery('.price-method[data-attr=annually]').removeClass('choosed')
      jQuery('.price-plan-row .price-monthly').removeClass('hide')
      jQuery('.price-plan-row .price-annually').addClass('hide')
    } else {
      jQuery(this).addClass('right')
      jQuery('.price-method[data-attr=monthly]').removeClass('choosed')
      jQuery('.price-method[data-attr=annually]').addClass('choosed')
      jQuery('.price-plan-row .price-monthly').addClass('hide')
      jQuery('.price-plan-row .price-annually').removeClass('hide')
    }
  })

  jQuery('#compare-plans-link, .price-plan-content a').click(function () {
    var id = jQuery(this).attr('href')

    jQuery('html, body').animate({
      scrollTop: jQuery(id).offset().top
    }, 300, 'linear')

    return false
  })
})
