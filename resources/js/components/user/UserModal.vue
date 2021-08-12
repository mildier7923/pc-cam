<template>
	<div class="modal fade" id="userModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<form @submit.prevent="storeUser" autocomplete="off">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">{{is_created ?'Crear':'Actualizar'}} Usuario</h5>
						<button type="button" class="close" @click="$parent.closeModal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" v-if="load_roles">
						<!-- Name -->
						<div class="form-group">
							<label for="name">Nombres</label>
							<input type="text" class="form-control" id="name" autocomplete="nope" v-model="user_data.name" required placeholder="Escribe los nombres">
						</div>

						<!-- Last Name  -->
						<div class="form-group">
							<label for="last_name">Apellidos</label>
							<input type="text" class="form-control" id="last_name" autocomplete="nope" v-model="user_data.last_name" required placeholder="Escribe los apellidos">
						</div>

						<!-- Phone -->
						<div class="form-group">
							<label for="phone">Telefono</label>
							<input type="number" class="form-control" id="phone" autocomplete="nope" v-model="user_data.phone" required placeholder="Escribe el telefono">
						</div>

						<!-- Email -->
						<div class="form-group">
							<label for="email">Correo Electrónico</label>
							<input type="email" class="form-control" id="email" autocomplete="nope" v-model="user_data.email" required placeholder="Escribe el correo electrónico">
						</div>

						<!-- Role -->
						<div class="form-group">
							<label for="selectRole">Role</label>
							<v-select :options="roles" v-model="user_data.role" placeholder="Selecciona un role">
								<template #search="{attributes, events}">
									<input class="vs__search" :required="!user_data.role" v-bind="attributes" v-on="events" />
								</template>
							</v-select>
						</div>

						<!-- Password -->
						<div class="form-group">
							<label for="password">Contraseña</label>
							<input type="password" class="form-control" id="password" v-model="password" :placeholder="`${is_created?'Escribe la contraseña':'Escribe la contraseña (Opcional)'}`" autocomplete="new-password" :required="is_created">
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" @click="$parent.closeModal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Guardar Cambios</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</template>

<script>
	export default {
		props: ['user'],
		data() {
			return {
				is_created: true,
				load_roles: false,
				roles: [],
				user_data: {},
				password: ''
			}
		},
		created() {
			this.getRoles()
			if (this.user) {
				this.is_created = false
				this.user_data = { ...this.user }
			} else this.is_created = true
		},
		methods: {
			getRoles() {
				this.load_roles = false
				axios.get('/users/get-all-roles').then(response => {
					this.roles = response.data
					this.load_roles = true
				})
			},
			storeUser() {
				axios
					.post(this.getRoute(), this.user_data)
					.then(() => {
						swal({
							title: `Usuario ${this.is_created ? 'Creado' : 'Actualizado'}!`,
							icon: 'success'
						}).then(() => {
							this.$parent.getContact()
							this.$parent.closeModal()
						})
					})
					.catch(error => {
						console.log(error)
						swal({
							title: 'Hay problemas con las credenciales!',
							icon: 'error'
						})
					})
			},
			getRoute() {
				if (this.is_created) {
					this.user_data.password = this.password
					return `/users/store`
				} else {
					if (this.password != '') {
						this.user_data.password = this.password
					}
					return `/users/update/${this.user_data.id}`
				}
			}
		}
	}
</script>
