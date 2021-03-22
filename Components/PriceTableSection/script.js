function setStickyPriceTableHeader () {
  var scrollTop = jQuery(window).scrollTop()
  var tableHeaderTop = jQuery('.price-table-header-wrapper').position().top
  var nextSectionTop = jQuery('.price-table-section').nextAll(':visible:eq(0)').position().top
  var windowHeight = jQuery(window).height()
  var headerHeight = jQuery('header').height()

  if (scrollTop + windowHeight > nextSectionTop) {
    var top = parseInt(jQuery('.price-table-fixed-wrapper').css('top'))
    var newTop = nextSectionTop - windowHeight + headerHeight
    if (top !== newTop) {
      jQuery('.price-table-fixed-wrapper').css({
        position: 'absolute',
        top: newTop + 'px'
      })
    }
  } else {
    jQuery('.price-table-fixed-wrapper').removeAttr('style')

    if (scrollTop + headerHeight > tableHeaderTop) {
      jQuery('.price-table-fixed-wrapper').removeClass('hide')
      // jQuery('.price-table-fixed-wrapper').css('top', scrollTop + 'px');
    } else {
      jQuery('.price-table-fixed-wrapper').addClass('hide')
      // jQuery('.price-table-fixed-wrapper').css('top', scrollTop + 'px');
    }
  }
}

jQuery(document).ready(function () {
  if (jQuery('.price-table-header-wrapper').length > 0) {
    setStickyPriceTableHeader()

    jQuery(window).scroll(function () {
      setStickyPriceTableHeader()
    })
  }

  jQuery('.price-title-view-more').click(function () {
    var tableIndex = jQuery(this).attr('data-table-index')

    if (jQuery(this).hasClass('open')) {
      jQuery(this).removeClass('open')
      jQuery('span', this).text('SEE')
      jQuery('#price-body-' + tableIndex).slideUp()
    } else {
      jQuery(this).addClass('open')
      jQuery('span', this).text('HIDE')
      jQuery('#price-body-' + tableIndex).slideDown()
    }
  })

  jQuery('.price-switch-ctrl').click(function () {
    if (jQuery(this).hasClass('right')) {
      jQuery('.price-switch-ctrl').removeClass('right')
      jQuery('.price-switch-label[data-attr=monthly]').addClass('choosed')
      jQuery('.price-switch-label[data-attr=annually]').removeClass('choosed')
      jQuery('.price-table-fixed-wrapper .price-monthly, .price-table-header-wrapper .price-monthly').removeClass('hide')
      jQuery('.price-table-fixed-wrapper .price-annually, .price-table-header-wrapper .price-annually').addClass('hide')
    } else {
      jQuery('.price-switch-ctrl').addClass('right')
      jQuery('.price-switch-label[data-attr=monthly]').removeClass('choosed')
      jQuery('.price-switch-label[data-attr=annually]').addClass('choosed')
      jQuery('.price-table-fixed-wrapper .price-monthly, .price-table-header-wrapper .price-monthly').addClass('hide')
      jQuery('.price-table-fixed-wrapper .price-annually, .price-table-header-wrapper .price-annually').removeClass('hide')
    }
  })

  jQuery('.price-title-inner span').click(function () {
    var windowWidth = jQuery(window).width()

    if (windowWidth < 1000) {
      jQuery('.info-icon', jQuery(this).parent()).trigger('click')
    }
  })

  jQuery('.info-icon').click(function () {
    var tipElem = jQuery('.price-title-tip', jQuery(this).parent())
    var windowWidth = jQuery(window).width()
    var containerWidth = jQuery('.price-table-wrapper .container').width()

    if (windowWidth < 800) {
      jQuery(tipElem).css('width', containerWidth + 'px')
    } else {
      // jQuery(tipElem).removeAttr('style');
    }

    if (jQuery(this).hasClass('open')) {
      jQuery(this).removeClass('open')
      tipElem.fadeOut('400')
    } else {
      jQuery('.dot-line').removeClass('open')
      jQuery('.price-val-tip').fadeOut('400')

      jQuery('.info-icon').removeClass('open')
      jQuery('.price-title-tip').fadeOut('400')

      jQuery(this).addClass('open')
      tipElem.fadeIn('400')
    }
  })

  jQuery('.dot-line').click(function () {
    var tipElem = jQuery('.price-val-tip', jQuery(this).parent())
    var windowWidth = jQuery(window).width()
    var containerWidth = jQuery('.price-table-wrapper .container').width()

    if (windowWidth < 800) {
      jQuery('.price-val-tip-content', jQuery(this).parent()).css('width', containerWidth + 'px')
    } else {
      // jQuery(tipElem).removeAttr('style');
    }

    if (jQuery(this).hasClass('open')) {
      jQuery(this).removeClass('open')
      tipElem.fadeOut('400')
    } else {
      jQuery('.info-icon').removeClass('open')
      jQuery('.price-title-tip').fadeOut('400')

      jQuery('.dot-line').removeClass('open')
      jQuery('.price-val-tip').fadeOut('400')

      jQuery(this).addClass('open')
      tipElem.fadeIn('400')
    }
  })
})
