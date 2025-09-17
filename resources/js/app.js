import './bootstrap'
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

import $ from 'jquery'
window.$ = window.jQuery = $

setTimeout(() => {
  import('./imports')
}, 50)
