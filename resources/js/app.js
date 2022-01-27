require('./bootstrap')

import Vue from 'vue'
import vSelect from 'vue-select'
import VeeValidate from 'vee-validate'
Vue.component('v-select', vSelect)
Vue.use(VeeValidate)

// Components----------------------
import ContactIndex from './components/contact/ContactIndex.vue'
import ContactInterviewed from './components/contact/ContactInterviewed.vue'
import UserIndex from './components/user/UserIndex.vue'
import ProductForm from './components/products/Form.vue'
import ProductEdit from './components/products/Edit.vue'

new Vue({
	el: '#app',
	components: {
		ContactIndex,
		ContactInterviewed,
		UserIndex,
		ProductForm,
		ProductEdit
	}
})
