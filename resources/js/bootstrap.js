window._ = require('lodash')
window.axios = require('axios')
window.Popper = require('popper.js').default

import 'bootstrap/dist/css/bootstrap.min.css'
import '@fortawesome/fontawesome-free/css/all.css'
import 'sweetalert'
import 'moment'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
