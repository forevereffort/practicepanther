jQuery(document).ready(function () {
  function allPressReleaseInit () {
    // jQuery('.all-press-release-load-spinner').removeClass('hide')

    var page = 1
    var postsPerPage = jQuery('#all-press-release-navigation').attr('data-posts-per-page')
    var nonce = jQuery('#all-press-release-navigation').attr('data-nonce')

    jQuery.ajax({
      type: 'post',
      dataType: 'json',
      url: window.FlyntData.ajaxurl,
      data: {
        action: 'get_all_press_releases',
        nonce: nonce,
        page: page,
        postsPerPage: postsPerPage
      },
      success: function (response) {
        jQuery('#all-press-release-row').html(response.blog_html)
        jQuery('#all-press-release-navigation').html(response.page_nav_html)

        pressReleaseNavigation()
        // jQuery('.all-press-release-load-spinner').addClass('hide')
      }
    })
  }

  if (jQuery('.all-press-release-section').length > 0) {
    allPressReleaseInit()
  }

  function pressReleaseNavigation () {
    jQuery('#all-press-release-navigation a').click(function (e) {
      e.preventDefault()

      if (jQuery(this).parent().hasClass('active')) {
        return false
      }

      jQuery('.all-press-release-load-spinner').removeClass('hide')

      var page = jQuery(this).attr('href').split('#')[1]
      var postsPerPage = jQuery('#all-press-release-navigation').attr('data-posts-per-page')
      var nonce = jQuery('#all-press-release-navigation').attr('data-nonce')

      jQuery.ajax({
        type: 'post',
        dataType: 'json',
        url: window.FlyntData.ajaxurl,
        data: {
          action: 'get_all_press_releases',
          nonce: nonce,
          page: page,
          postsPerPage: postsPerPage
        },
        success: function (response) {
          jQuery('#all-press-release-row').html(response.blog_html)
          jQuery('#all-press-release-navigation').html(response.page_nav_html)

          pressReleaseNavigation()
          jQuery('.all-press-release-load-spinner').addClass('hide')
        }
      })

      return false
    })
  }

  pressReleaseNavigation()
})
