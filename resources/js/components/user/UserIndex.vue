<template>
	<section>
		<div v-if="load">
			<div class="card">
				<div class="card-header d-flex justify-content-between">
					<h2 class="h5 col-6">Lista de usuarios</h2>
					<div class="col-6  d-flex justify-content-end">
						<button class="btn btn-secondary btn-sm" @click="createUser">
							<i class="fas fa-user-plus"></i>
							<samp class="pl-2">Crear Usuario</samp>
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="table" class="table table-striped table-bordered table-wrap table-sm">
							<thead>
								<tr>
									<td>Nombres</td>
									<td>Apellidos</td>
									<td>Telefono</td>
									<td>Correo</td>
									<td>Role</td>
									<td>Accion</td>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(item, index) in users" :key="index">
									<td>{{item.name}}</td>
									<td>{{item.last_name}}</td>
									<td>{{item.phone}}</td>
									<td>{{item.email}}</td>
									<td>{{!item.roles[0] ? 'N/A' : item.roles[0].name}}</td>
									<td>
										<div class="actions w-100 d-flex justify-content-center">
											<button type="button" class="btn btn-link" title="Editar Usuario" @click="editUser(item.id, index)"><i class="fas fa-user-edit"></i>
											</button>
											<button type="button" class="btn btn-link" title="Eliminar Usuario" @click="validateDeleteUser(item.id)" v-if="auth_user.id != item.id">
												<i class="fas fa-trash"></i>
											</button>
											<button type="button" class="btn btn-link" title="Eliminar Usuario" disabled v-else><i class="fas fa-trash"></i>
											</button>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div v-if="load_modal">
			<user-modal :user="user" />
		</div>
	</section>
</template>

<script>
	import UserModal from './UserModal.vue'
	export default {
		props: ['auth_user'],
		components: {
			UserModal
		},
		data() {
			return {
				load: false,
				load_modal: false,
				users: [],
				user: null
			}
		},
		created() {
			this.getContact()
		},
		methods: {
			getContact() {
				this.load = false
				axios
					.get('/users/get-all')
					.then(response => {
						this.users = response.data
						this.load = true
					})
					.finally(() => {
						setTimeout(() => {
							$(`#table`).DataTable({
								dom: 'Bfrtip',
								buttons: ['excel', 'copy'],
								process: true
							})
						}, 200)
					})
			},
			editUser(user_id) {
				this.load_modal = false
				axios.get(`users/get/${user_id}`).then(response => {
					this.user = response.data
					this.user.role =
						this.user.roles.length > 0 ? this.user.roles[0].name : ''
					this.openModal()
				})
			},
			createUser() {
				this.load_modal = false
				this.user = null
				this.openModal()
			},
			validateDeleteUser(user_id) {
				swal({
					title: 'Estas Seguro de Eliminarlo?',
					icon: 'warning',
					buttons: true,
					dangerMode: true
				}).then(willDelete => {
					if (willDelete) this.deleteUser(user_id)
				})
			},
			deleteUser(user_id) {
				axios.delete(`users/delete/${user_id}`).then(() => {
					location.reload()
					swal({
						title: 'Usuario Eliminado!',
						icon: 'success'
					})
				})
			},
			openModal() {
				this.load_modal = true
				setTimeout(() => {
					$('#userModal').modal('show')
				}, 200)
			},
			closeModal() {
				$('#userModal').modal('hide')
				setTimeout(() => {
					this.load_modal = false
				}, 200)
			}
		}
	}
</script>
