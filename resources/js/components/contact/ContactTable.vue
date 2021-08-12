<template>
	<div class="table-responsive">
		<table :id="`table-${type}`" class="table table-striped table-bordered table-wrap table-sm">
			<thead>
				<tr>
					<td>Nombres</td>
					<td>Apellidos</td>
					<td>Telefono</td>
					<td>Correo</td>
					<td>Mensaje</td>
					<td v-if="type == 'contact-true'">Usuario</td>
					<td>Accion</td>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in contacts_data" :key="index">
					<td>{{item.name}}</td>
					<td>{{item.last_name}}</td>
					<td>{{item.phone}}</td>
					<td>{{item.email}}</td>
					<td>{{item.message}}</td>
					<td v-if="type == 'contact-true'">{{!item.user ? 'N/A':item.user.name}}</td>
					<td>
						<div class="actions w-100 d-flex justify-content-center">
							<button type="button" class="btn btn-link" title="Agregar a Contactos Entrevistados" @click="addToInterviewed(item.id, index)" v-if="type == 'contact-false'">
								<i class="fas fa-user-check"></i>
							</button>
							<button type="button" class="btn btn-link" title="Eliminar Contacto" @click="validateDeleteContact(item.id, index)"><i class="fas fa-trash"></i>
							</button>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
	export default {
		props: ['type', 'contacts'],
		data() {
			return {
				contacts_data: this.contacts
			}
		},
		mounted() {
			$(`#table-${this.type}`).DataTable({
				dom: 'Bfrtip',
				buttons: ['excel', 'copy'],
				process: true
			})
		},
		methods: {
			addToInterviewed(contact_id, index) {
				axios
					.put(`contacts/status-update/${contact_id}`, { contact: true })
					.then(() => {
						this.deleteToArray(index)
						swal({
							title: 'Contacto Actualizado!',
							icon: 'success'
						})
					})
			},
			validateDeleteContact(contact_id, index) {
				swal({
					title: 'Estas Seguro de Eliminarlo?',
					icon: 'warning',
					buttons: true,
					dangerMode: true
				}).then(willDelete => {
					if (willDelete) this.deleteContact(contact_id, index)
				})
			},
			deleteContact(contact_id, index) {
				axios.delete(`contacts/delete/${contact_id}`).then(() => {
					this.deleteToArray(index)
					swal({
						title: 'Contacto Eliminado!',
						icon: 'success'
					})
				})
			},
			deleteToArray(index) {
				this.contacts_data.splice(index, 1)
				if (this.contacts_data.length == 0) {
					location.reload()
				}
			}
		}
	}
</script>
