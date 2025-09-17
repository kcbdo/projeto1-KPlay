'use strict'

$(function () {
  $('.card-body-home').each(function () {
    var $card = $(this)
    let lastScrollTop = 0
    let cardHeight = 770
    let isProgrammaticScroll = true

    $card.scrollTop(cardHeight)

    function onScroll() {
      if (isProgrammaticScroll) {
        isProgrammaticScroll = false

        let currentScroll = $card.scrollTop()

        currentScroll =
          currentScroll > lastScrollTop ? lastScrollTop + cardHeight : lastScrollTop - cardHeight

        $card.scrollTop(currentScroll)

        setTimeout(function () {
          isProgrammaticScroll = true
        }, 800)

        lastScrollTop = currentScroll
      }
    }

    $card.on('scroll', onScroll)

    $card.find('.teste').on('click', function () {
      onScroll()
    })
  })
})
