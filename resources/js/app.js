import Alpine from 'alpinejs'

window._ = require('lodash')
window.axios = require('axios')
window.Alpine = Alpine

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

Alpine.start()
