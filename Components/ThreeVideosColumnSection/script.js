import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'

jQuery(document).ready(function () {
  jQuery('.three-videos-column-image').click(function () {
    var $videoWrapperElem = jQuery('.three-videos-column-dialog', jQuery(this).parent().parent())
    var $videoElem = jQuery('video', $videoWrapperElem)[0]

    disableBodyScroll($videoWrapperElem[0])

    $videoElem.load()

    jQuery($videoWrapperElem).fadeIn()
  })

  jQuery('.three-videos-column-dialog-close-btn').click(function () {
    var $videoWrapperElem = jQuery(this).parent().parent()
    var $videoElem = jQuery('video', $videoWrapperElem)[0]

    enableBodyScroll($videoWrapperElem[0])

    $videoElem.pause()

    jQuery($videoWrapperElem).fadeOut()

    // $videoElem.load()
    // $videoElem.pause()
    // $videoElem.currentTime = 0
  })

  jQuery('.three-videos-column-dialog-inner').click(function (e) {
    e.preventDefault()
    return false
  })

  jQuery('.three-videos-column-dialog').click(function (e) {
    enableBodyScroll(this)

    jQuery(this).fadeOut()
  })
})
