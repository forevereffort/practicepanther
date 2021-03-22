jQuery(document).ready(function () {
  jQuery('.team-members-section .load-more a').click(function (e) {
    e.preventDefault()
    jQuery('.team-member').show()
    jQuery(this).hide()
  })
})
