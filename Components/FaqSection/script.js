jQuery(document).ready(function () {
  jQuery('.faq-title h3').click(function () {
    if (jQuery(this).hasClass('open')) {
      jQuery(this).removeClass('open')
      jQuery('.faq-content', jQuery(this).parent().parent()).slideUp('500')
    } else {
      jQuery(this).addClass('open')
      jQuery('.faq-content', jQuery(this).parent().parent()).slideDown('500')
    }
  })
})
