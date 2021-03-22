jQuery(document).ready(function () {
  function allBlogInit () {
    // jQuery('.all-blog-load-spinner').removeClass('hide')

    var displayedPosts = []

    jQuery('.displayed-post').each(function () {
      displayedPosts.push(jQuery(this).attr('data-post-id'))
    })

    var page = 1
    var postsPerPage = jQuery('#all-blog-navigation').attr('data-posts-per-page')
    var nonce = jQuery('#all-blog-navigation').attr('data-nonce')
    var bannerImageUrl = jQuery('#all-blog-navigation').attr('data-banner-image-url')
    var bannerLinkUrl = jQuery('#all-blog-navigation').attr('data-banner-link-url')

    jQuery.ajax({
      type: 'post',
      dataType: 'json',
      url: window.FlyntData.ajaxurl,
      data: {
        action: 'get_all_blog_posts',
        nonce: nonce,
        page: page,
        postsPerPage: postsPerPage,
        bannerImageUrl: bannerImageUrl,
        bannerLinkUrl: bannerLinkUrl,
        displayedPosts: displayedPosts
      },
      success: function (response) {
        jQuery('#all-blog-row').html(response.blog_html)
        jQuery('#all-blog-navigation').html(response.page_nav_html)

        blogNavigation()
        // jQuery('.all-blog-load-spinner').addClass('hide')
      }
    })
  }

  if (jQuery('.all-blog-section').length > 0) {
    allBlogInit()
  }

  function blogNavigation () {
    jQuery('#all-blog-navigation a').click(function (e) {
      e.preventDefault()

      if (jQuery(this).parent().hasClass('active')) {
        return false
      }

      jQuery('.all-blog-load-spinner').removeClass('hide')

      var displayedPosts = []

      jQuery('.displayed-post').each(function () {
        displayedPosts.push(jQuery(this).attr('data-post-id'))
      })

      var page = jQuery(this).attr('href').split('#')[1]
      var postsPerPage = jQuery('#all-blog-navigation').attr('data-posts-per-page')
      var nonce = jQuery('#all-blog-navigation').attr('data-nonce')
      var bannerImageUrl = jQuery('#all-blog-navigation').attr('data-banner-image-url')
      var bannerLinkUrl = jQuery('#all-blog-navigation').attr('data-banner-link-url')

      jQuery.ajax({
        type: 'post',
        dataType: 'json',
        url: window.FlyntData.ajaxurl,
        data: {
          action: 'get_all_blog_posts',
          nonce: nonce,
          page: page,
          postsPerPage: postsPerPage,
          bannerImageUrl: bannerImageUrl,
          bannerLinkUrl: bannerLinkUrl,
          displayedPosts: displayedPosts
        },
        success: function (response) {
          jQuery('#all-blog-row').html(response.blog_html)
          jQuery('#all-blog-navigation').html(response.page_nav_html)

          blogNavigation()
          jQuery('.all-blog-load-spinner').addClass('hide')
        }
      })

      return false
    })
  }

  // blogNavigation()
})
