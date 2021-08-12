<template>
	<section>
		<div v-if="load">
			<div class="card">
				<div class="card-header">
					<h2 class="h5">Contactos Nuevos</h2>
				</div>
				<div class="card-body">
					<contact-table type="contact-false" :contacts="contact_false" />
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	import ContactTable from './ContactTable.vue'
	export default {
		components: {
			ContactTable
		},
		data() {
			return {
				load: false,
				contact_false: []
			}
		},
		created() {
			this.getContact()
		},
		methods: {
			getContact() {
				this.load = false
				axios.get('/contacts/get-all/false').then(response => {
					this.contact_false = response.data
					this.load = true
				})
			}
		}
	}
</script>
