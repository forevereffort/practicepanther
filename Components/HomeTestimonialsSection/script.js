import Swiper from 'swiper'
import 'swiper/css/swiper.min.css'

var testimonialSlider = ''

function initTestimonialSlider () {
  var windowWidth = jQuery(window).width()

  if (windowWidth < 1000) {
    if (testimonialSlider === '') {
      // init slider
      jQuery('.home-testimonial-slider').addClass('swiper-container')
      jQuery('.home-testimonial-wrapper').addClass('swiper-wrapper')
      jQuery('.home-testimonial').addClass('swiper-slide')

      testimonialSlider = new Swiper('.home-testimonial-slider', {
        slidesPerView: 1,
        spaceBetween: 0,
        // autoplay: {
        //   delay: 300,
        // },
        loop: true,
        navigation: {
          nextEl: '.home-testimonial-slider-next',
          prevEl: '.home-testimonial-slider-prev'
        }
      })

      // console.log('init')
    }
  } else {
    if (testimonialSlider !== '') {
      // destory slider
      testimonialSlider.destroy()
      testimonialSlider = ''
      jQuery('.home-testimonial-slider').removeClass('swiper-container')
      jQuery('.home-testimonial-wrapper').removeClass('swiper-wrapper')
      jQuery('.home-testimonial').removeClass('swiper-slide')

      // console.log('destory')
    }
  }
}

jQuery(document).ready(function () {
  if (jQuery('.home-testimonial-slider').length > 0) {
    initTestimonialSlider()

    jQuery(window).resize(function () {
      initTestimonialSlider()
    })
  }
})
