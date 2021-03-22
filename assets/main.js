import 'normalize.css/normalize.css'
import './main.scss'

window.lazySizesConfig = window.lazySizesConfig || {}
window.lazySizesConfig.preloadAfterLoad = true

// require('lazysizes/plugins/respimg/ls.respimg')
require('lazysizes/plugins/bgset/ls.bgset')
require('lazysizes')

function importAll (r) {
  r.keys().forEach(r)
}

importAll(require.context('../Components/', true, /\/script\.js$/))

/**
 * Search button should be disabled when search bar is empty for search form
 */

jQuery(document).ready(function () {
  jQuery('.site-blog-search-form').submit(function () {
    var s = jQuery('input[name=s]', this).val()

    if (!s) {
      return false
    }

    return true
  })
})
