import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'

jQuery(document).ready(function ($) {
  $('.header-mobile-menu-btn').click(function () {
    if ($(this).hasClass('is-active')) {
      $(this).removeClass('is-active')
      $('.header-nav').removeClass('is-active')
      enableBodyScroll(document.querySelector('.header-nav'))
      // Wait until menu closing animation is done
      setTimeout(function () {
        // Close all open sub menus
        closeAllMobileSubMenu()
        // It's 400 because the transition duration of the menu in css is 0.4s
      }, 400)
    } else {
      $(this).addClass('is-active')
      // Measure height of window, subtract height of header-logo element and set that as the height of menu container for full height effect
      $('.header-nav').innerHeight(((window.innerHeight) - (jQuery('.header-logo').outerHeight()))).addClass('is-active')
      disableBodyScroll(document.querySelector('.header-nav'))
    }
  })

  if ($(window).width() > 1000) {
    attachHoverMenuEventHandlers()
    removeMobileSubMenuEventHandler()
    closeAllMobileSubMenu()
  } else {
    unbindHoverMenuEventHandlers()
    bindToggleMobileSubMenuEvent()
  }
})

jQuery(window).resize(function () {
  if (jQuery(window).width() > 1000) {
    attachHoverMenuEventHandlers()
    removeMobileSubMenuEventHandler()

    // Close menu when changing to desktop
    jQuery('.header-mobile-menu-btn').removeClass('is-active')
    jQuery('.header-nav').removeClass('is-active')
  } else {
    unbindHoverMenuEventHandlers()
    bindToggleMobileSubMenuEvent()
  }
})

function closeAllMobileSubMenu () {
  jQuery('.sub-menu.open').slideToggle(1).removeClass('open')
  jQuery('.menu-arrow.rotated').removeClass('rotated')
}

function bindToggleMobileSubMenuEvent () {
  if (!window.mobileMenuEventsAttached) {
    jQuery('.menu-item-has-children>a.menu-link .menu-arrow').click(function (e) {
      e.preventDefault()

      // Close other open sub menus
      jQuery('.sub-menu.open').not(jQuery(this).parent().siblings('.sub-menu')).slideToggle(500).toggleClass('open')

      // Restore other rotated arrows to initial position
      jQuery('.menu-arrow.rotated').not(jQuery(this)).toggleClass('rotated')

      // Open this sub menu
      jQuery(this).parent().siblings('.sub-menu').slideToggle(500).toggleClass('open')

      // Rotate this sub menu's arrow
      jQuery(this).toggleClass('rotated')
    })

    window.mobileMenuEventsAttached = true
  }
}

function removeMobileSubMenuEventHandler () {
  if (window.mobileMenuEventsAttached) {
    jQuery('.menu-item-has-children>a.menu-link .menu-arrow').off('click')

    // Remove styles left over from slideToggle when changing to desktop
    jQuery('.sub-menu').removeAttr('style')
    jQuery('.header-nav').removeAttr('style')
    closeAllMobileSubMenu()

    window.mobileMenuEventsAttached = false
  }
}

function attachHoverMenuEventHandlers () {
  // On desktop only and don't attach handlers if function has already run
  if (!window.desktopMenuEventsAttached) {
    // Fade out main menu items not hovered and not free trial and login
    jQuery('.header-menu>li:not(.free-trial):not(.login)>a').hover(function () {
      jQuery('.header-menu>li>a').not(this).not('.header-menu>li.login>a, .header-menu>li.free-trial>a').toggleClass('fade')
    })

    // Fade out sub menu items not hovered
    jQuery('.header-menu .sub-menu a').hover(function () {
      jQuery('.header-menu .sub-menu a').not(this).toggleClass('fade')
    })

    // Fade out main menu items except the one corresponding to the sub menu being hovered
    jQuery('.sub-menu').hover(function () {
      jQuery('.header-menu>li:not(.free-trial):not(.login)>a').not(jQuery(this).siblings('a.menu-link')).toggleClass('fade')
    })

    // Open sub menu and keep open. Close when hovering over a different menu item
    jQuery('.header-menu>.menu-item').hover(
      function () {
        var $this = jQuery(this)
        setTimeout(function () {
          jQuery('.sub-menu.active').removeClass('active')
          $this.children('.sub-menu').addClass('active')
        }, 200)
      }
    )

    // Close sub menu when not hovering header element
    jQuery('header>.container').hover(function () {}, function () {
      setTimeout(function () {
        jQuery('.sub-menu.active').removeClass('active')
      }, 200)
    })

    window.desktopMenuEventsAttached = true
  }
}

function unbindHoverMenuEventHandlers () {
  if (window.desktopMenuEventsAttached) {
    jQuery('.header-menu>li:not(.free-trial):not(.login)>a, header>.container, .header-menu>.menu-item, .sub-menu, .header-menu .sub-menu a').off('mouseenter mouseleave')

    jQuery('.header-menu a.fade').removeClass('fade')

    window.desktopMenuEventsAttached = false
  }
}
