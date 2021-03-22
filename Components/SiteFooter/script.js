jQuery(document).ready(function () {
  jQuery('.widget-title').click(function () {
    var windowWidth = jQuery(window).width()

    if (windowWidth < 900) {
      if (jQuery(this).hasClass('open')) {
        jQuery(this).removeClass('open')
        jQuery('h2~div', jQuery(this).parent()).slideUp('1000')
      } else {
        jQuery(this).addClass('open')
        jQuery('h2~div', jQuery(this).parent()).slideDown('1000')
      }
    }
  })
})
