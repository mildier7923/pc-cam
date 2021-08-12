<template>
	<section>
		<div v-if="load">
			<div class="mt-2">
				<div class="card">
					<div class="card-header">
						<h2 class="h5">Contactos Entrevistados</h2>
					</div>
					<div class="card-body">
						<contact-table type="contact-true" :contacts="contact_true" />
					</div>
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
				contact_true: []
			}
		},
		created() {
			this.getContact()
		},
		methods: {
			getContact() {
				this.load = false
				axios.get('/contacts/get-all/true').then(response => {
					this.contact_true = response.data
					this.load = true
				})
			}
		}
	}
</script>
