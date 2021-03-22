import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'
import Cookies from 'js-cookie'

jQuery(document).ready(function () {
  function showHomeModal () {
    if (jQuery('#homepage-modal-wrapper').length > 0) {
      disableBodyScroll(document.querySelector('#homepage-modal-wrapper'))
      jQuery('#homepage-modal-wrapper').removeClass('hide')
    }
  }

  const wasEmailInserted = Cookies.get('WasEmailInserted')

  if (typeof wasEmailInserted === 'undefined' || wasEmailInserted === 'false') {
    if (jQuery('#homepage-modal-wrapper').length > 0 && jQuery('#homepage-modal-wrapper').attr('data-show-init') === 'true') {
      showHomeModal()
    }
  }

  jQuery('.header-menu .free-trial a').click(function () {
    showHomeModal()

    return false
  })

  jQuery('#homepage-modal-close').click(function () {
    enableBodyScroll(document.querySelector('#homepage-modal-wrapper'))
    jQuery('#homepage-modal-wrapper').addClass('hide')
  })
})

// detect jquery gravity form fire status
jQuery(document).on('gform_confirmation_loaded', function (event, formId) {
  if (jQuery('#homepage-modal-wrapper').length > 0) {
    const homeModalGFormID = parseInt(jQuery('#homepage-modal-wrapper').attr('data-gform-id'))
    if (homeModalGFormID === formId) {
      // home modal gForm worked successfully, set cookie value
      Cookies.set('WasEmailInserted', 'true')
    }
  }
})
