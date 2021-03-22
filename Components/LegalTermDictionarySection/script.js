function setStickyLegalTermDictionaryCatHeader () {
  var scrollTop = jQuery(window).scrollTop()
  var tableHeaderTop = jQuery('.legal-term-dictionary-cat-section').position().top
  // get next element window top position
  var nextSectionTop = jQuery('.legal-term-dictionary-list-section').nextAll(':visible:eq(0)').position().top
  var windowHeight = jQuery(window).height()
  var headerHeight = jQuery('header').height()

  if (scrollTop + windowHeight > nextSectionTop) {
    var top = parseInt(jQuery('.legal-term-dictionary-cat-fixed-section').css('top'))
    var newTop = nextSectionTop - windowHeight + headerHeight
    if (top !== newTop) {
      jQuery('.legal-term-dictionary-cat-fixed-section').css({
        position: 'absolute',
        top: newTop + 'px'
      })
    }
  } else {
    jQuery('.legal-term-dictionary-cat-fixed-section').removeAttr('style')

    if (scrollTop + headerHeight > tableHeaderTop) {
      jQuery('.legal-term-dictionary-cat-fixed-section').removeClass('hide')
      // jQuery('.legal-term-dictionary-cat-fixed-section').css('top', scrollTop + 'px');
    } else {
      jQuery('.legal-term-dictionary-cat-fixed-section').addClass('hide')
      // jQuery('.legal-term-dictionary-cat-fixed-section').css('top', scrollTop + 'px');
    }
  }
}

function setStickyLegalTermDictionaryCatMobileHeader () {
  var scrollTop = jQuery(window).scrollTop()
  var tableHeaderTop = jQuery('.legal-term-dictionary-mobile-cat-section').position().top
  // get next element window top position
  var nextSectionTop = jQuery('.legal-term-dictionary-list-section').nextAll(':visible:eq(0)').position().top
  var windowHeight = jQuery(window).height()
  var headerHeight = jQuery('header').height()

  if (scrollTop + windowHeight > nextSectionTop) {
    var top = parseInt(jQuery('.legal-term-dictionary-mobile-cat-fixed-section').css('top'))
    var newTop = nextSectionTop - windowHeight + headerHeight
    if (top !== newTop) {
      jQuery('.legal-term-dictionary-mobile-cat-fixed-section').css({
        position: 'absolute',
        top: newTop + 'px'
      })
    }
  } else {
    jQuery('.legal-term-dictionary-mobile-cat-fixed-section').removeAttr('style')

    if (scrollTop + headerHeight > tableHeaderTop) {
      jQuery('.legal-term-dictionary-mobile-cat-fixed-section').removeClass('hide')
      // jQuery('.legal-term-dictionary-mobile-cat-fixed-section').css('top', scrollTop + 'px');
    } else {
      jQuery('.legal-term-dictionary-mobile-cat-fixed-section').addClass('hide')
      // jQuery('.legal-term-dictionary-mobile-cat-fixed-section').css('top', scrollTop + 'px');
    }
  }
}

jQuery(document).ready(function () {
  var windowWidth = jQuery(window).width()

  if (windowWidth > 1000) {
    // working only for desktop
    if (jQuery('.legal-term-dictionary-cat-section').length > 0) {
      setStickyLegalTermDictionaryCatHeader()

      jQuery(window).scroll(function () {
        setStickyLegalTermDictionaryCatHeader()
      })
    }
  } else {
    // working only for mobile
    if (jQuery('.legal-term-dictionary-mobile-cat-section').length > 0) {
      setStickyLegalTermDictionaryCatMobileHeader()

      jQuery(window).scroll(function () {
        setStickyLegalTermDictionaryCatMobileHeader()
      })
    }
  }

  jQuery('.legal-term-dictionary-cat-item').click(function () {
    var cat = jQuery(this).attr('data-id')

    if (jQuery(`#legal-term-dictionary-${cat}`).length > 0) {
      var offset = 145

      if (windowWidth < 1000) {
        // change offset on mobile
        // offset = 50 + jQuery('.legal-term-dictionary-mobile-cat-fixed-section').height();
        offset = 226
      }

      jQuery('html,body').animate({
        scrollTop: jQuery(`#legal-term-dictionary-${cat}`).offset().top - offset
      }, 1000)
    }
  })

  jQuery('.legal-term-dictionary-mobile-cat-title').click(function () {
    if (jQuery(this).hasClass('open')) {
      jQuery('.legal-term-dictionary-mobile-cat-title').removeClass('open')
      // jQuery('.legal-term-dictionary-mobile-cat-list', jQuery(this).parent()).slideUp('1000')
      jQuery('.legal-term-dictionary-mobile-cat-list').slideUp('1000')
    } else {
      jQuery('.legal-term-dictionary-mobile-cat-title').addClass('open')
      // jQuery('.legal-term-dictionary-mobile-cat-list', jQuery(this).parent()).slideDown('1000')
      jQuery('.legal-term-dictionary-mobile-cat-list').slideDown('1000')
    }
  })
})
