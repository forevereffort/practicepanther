jQuery(document).ready(function () {
  jQuery('.post-content sup a').click(function (e) {
    e.preventDefault()

    var id = jQuery(this).attr('href')
    var refElem = jQuery(id)

    if (refElem.length > 0) {
      var h = parseInt(jQuery('header').outerHeight())

      if (jQuery('#wpadminbar').length > 0) {
        h += parseInt(jQuery('#wpadminbar').outerHeight())
      }

      jQuery('html, body').animate({
        scrollTop: parseInt(refElem.offset().top) - h
      }, 300, 'linear')
    }

    return false
  })

  function setArticleTopBarWidth () {
    var windowW = parseInt(jQuery(window).width())
    var diffH = parseInt(jQuery(document).height()) - parseInt(jQuery(window).height())
    var scrollT = parseInt(jQuery(window).scrollTop())
    var w = parseInt(windowW * scrollT / diffH)

    jQuery('.post-fixed-line').css('width', w + 'px')
  }

  if (jQuery('.post-fixed-line').length > 0) {
    setArticleTopBarWidth()

    jQuery(window).scroll(function () {
      setArticleTopBarWidth()
    })

    jQuery(window).resize(function () {
      setArticleTopBarWidth()
    })
  }

  jQuery('.post-popup-dialog-close').click(function () {
    jQuery(this).parent().removeClass('post-popup-show')
  })

  function checkPostPopupDialog () {
    if (jQuery('.post-popup-dialog.post-popup-hide').length > 0) {
      var s = jQuery(window).scrollTop()
      var d = jQuery(document).height()
      var c = jQuery(window).height()

      var scrollPercent = (s / (d - c)) * 100

      jQuery('.post-popup-dialog.post-popup-hide').each(function () {
        var trigger = parseInt(jQuery(this).attr('data-trigger'))

        if (scrollPercent > trigger) {
          jQuery(this).removeClass('post-popup-hide').addClass('post-popup-show')
        }
      })
    }
  }

  checkPostPopupDialog()

  jQuery(window).on('scroll', function () {
    checkPostPopupDialog()
  })
})
