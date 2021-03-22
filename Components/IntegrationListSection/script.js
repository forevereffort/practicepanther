jQuery(document).ready(function () {
  jQuery('.integration-category-link a').click(function () {
    var $buttonElem = this
    var $rowElem = jQuery('.integration-category-row', jQuery(this).parent().parent())
    var currentPage = parseInt(jQuery(this).attr('data-current-page'))
    var postsPerPage = parseInt(jQuery(this).attr('data-posts-per-page'))
    var totalPages = parseInt(jQuery(this).attr('data-total-pages'))
    var catID = parseInt(jQuery(this).attr('data-cat-id'))

    if (currentPage < totalPages) {
      var nonce = jQuery(this).attr('data-nonce')

      jQuery('.integration-list-load-spinner').removeClass('hide')

      jQuery.ajax({
        type: 'post',
        dataType: 'json',
        url: window.FlyntData.ajaxurl,
        data: {
          action: 'get_more_integrations_with_category_id',
          nonce: nonce,
          page: currentPage + 1,
          postsPerPage: postsPerPage,
          catID: catID
        },
        success: function (response) {
          response.integrations.map(integration => {
            jQuery($rowElem).append(`
                    <div class="integration-category-item">
                        <a href="${integration.link}">
                            <div class="integration-category-item-inner">
                                <div class="integration-category-item-image">
                                    <img src="${integration.icon_image.url}" alt="${integration.icon_image.alt}">
                                </div>
                                <div class="integration-category-item-info">
                                    <h3>${integration.title}</h3>
                                    <p>${integration.excerpt}...</p>
                                </div>
                            </div>
                        </a>
                    </div>
                `)
          })

          jQuery($buttonElem).attr('data-current-page', currentPage + 1)

          if (currentPage + 1 === totalPages) {
            jQuery($buttonElem).parent().remove()
          }

          jQuery('.integration-list-load-spinner').addClass('hide')
        }
      })
    }

    return false
  })
})
