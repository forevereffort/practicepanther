jQuery(document).ready(function () {
  jQuery('.press-testimonial-list-link a').click(function () {
    var $buttonElem = this
    var currentPage = parseInt(jQuery(this).attr('data-current-page'))
    var postsPerPage = parseInt(jQuery(this).attr('data-posts-per-page'))
    var totalPages = parseInt(jQuery(this).attr('data-total-pages'))

    if (currentPage < totalPages) {
      var nonce = jQuery(this).attr('data-nonce')

      jQuery('.press-testimonial-list-load-spinner').removeClass('hide')

      jQuery.ajax({
        type: 'post',
        dataType: 'json',
        url: window.FlyntData.ajaxurl,
        data: {
          action: 'get_more_press_testimonials',
          nonce: nonce,
          page: currentPage + 1,
          postsPerPage: postsPerPage
        },
        success: function (response) {
          response.tesimonials.map(testimonial => {
            jQuery('#press-testimonial-list-row').append(`
                            <div class="press-testimonial-list-item">
                                <div class="press-testimonial-list-item-inner">
                                  <div class="press-testimonial-top-part">
                                    <div class="top-line"></div>
                                    <div class="content">${testimonial.content}</div>
                                  </div>
                                  <div class="press-testimonial-bottom-part">
                                    <div class="info">
                                        <h2>${testimonial.title}</h2>
                                        <p>${testimonial.testimonial_date}</p>
                                    </div>
                                    <div class="company">
                                        <img src="${testimonial.company_logo.url}" srcset="${testimonial.company_logo.url} 1x, ${testimonial.company_logo.retina_url} 2x" alt="${testimonial.company_logo.alt}">
                                    </div>
                                  </div>
                                </div>
                            </div>
                        `)
          })

          jQuery($buttonElem).attr('data-current-page', currentPage + 1)

          if (currentPage + 1 === totalPages) {
            jQuery($buttonElem).parent().remove()
          }

          jQuery('.press-testimonial-list-load-spinner').addClass('hide')
        }
      })
    }

    return false
  })
})
