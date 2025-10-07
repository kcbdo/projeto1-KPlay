import './bootstrap'
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

import $ from 'jquery'
window.$ = window.jQuery = $

// Bootstrap JS (dropdowns, etc.)
import 'bootstrap/dist/js/bootstrap.bundle.min.js'

setTimeout(() => {
  import('./imports')
}, 50)
