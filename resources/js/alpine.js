import Alpine from 'alpinejs'
// import trap from '@alpinejs/trap'
import collapse from '@alpinejs/collapse'
import Interval from '@alpine-collective/toolkit-interval'


// Alpine.plugin(trap)
Alpine.plugin(collapse)
window.Alpine = Alpine
Alpine.start()
export default Alpine
