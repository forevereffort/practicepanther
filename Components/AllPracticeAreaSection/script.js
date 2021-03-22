jQuery(document).ready(function () {
  jQuery('.all-practice-area-load-button a').click(function () {
    var currentPage = parseInt(jQuery(this).attr('data-current-page'))
    var postsPerPage = parseInt(jQuery(this).attr('data-posts-per-page'))
    var totalPage = parseInt(jQuery(this).attr('data-total-pages'))

    currentPage += postsPerPage

    jQuery('.all-practice-area-item').each(function (index, elem) {
      var elemIndex = parseInt(jQuery(elem).attr('data-index'))

      if (elemIndex <= currentPage) {
        jQuery(elem).removeClass('mobile-hide')
      }
    })

    jQuery(this).attr('data-current-page', currentPage)

    if (currentPage >= totalPage) {
      jQuery(this).parent().remove()
    }

    return false
  })
})
