jQuery(document).ready(function () {
  jQuery('.question-answer-tab').click(function () {
    if (!jQuery(this).hasClass('active')) {
      var index = jQuery(this).attr('data-index')

      jQuery('.question-answer-tab').removeClass('active')
      jQuery(this).addClass('active')
      jQuery('.question-answer-lists').addClass('hide')
      jQuery('.question-answer-lists-' + index).removeClass('hide')
    }
  })

  jQuery('.question-answer-title h3').click(function () {
    if (jQuery(this).hasClass('open')) {
      jQuery(this).removeClass('open')
      jQuery('.question-answer-content', jQuery(this).parent().parent()).slideUp('500')
    } else {
      jQuery(this).addClass('open')
      jQuery('.question-answer-content', jQuery(this).parent().parent()).slideDown('500')
    }
  })

  jQuery('.question-answer-combobox-label').click(function () {
    var $wrapper = jQuery('.question-answer-combobox-wrapper', jQuery(this).parent())

    if (jQuery(this).hasClass('open')) {
      jQuery($wrapper).slideUp()
      jQuery(this).removeClass('open')
    } else {
      jQuery($wrapper).slideDown()
      jQuery(this).addClass('open')
    }
  })

  jQuery('.question-answer-combobox-wrapper .question-answer-combobox').click(function () {
    var label = jQuery(this).text()
    var index = jQuery(this).attr('data-index')

    jQuery(this).parent().slideUp()
    jQuery('.question-answer-combobox-label', jQuery(this).parent().parent()).removeClass('open')
    jQuery('.question-answer-combobox-label').text(label)

    jQuery('.question-answer-lists').addClass('hide')
    jQuery('.question-answer-lists-' + index).removeClass('hide')
  })
})
