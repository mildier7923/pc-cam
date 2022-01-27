<template>
    <div class="container mt-4">
        <h4>product</h4>
        <form @submit.prevent="action" method="post" enctype="multipart/form-data" class="mt-3">
            <div class="input-group">
                <div class="mb-3 col-6">
                    <label for="name" class="form-label">Name product</label>
                    <input type="text" class="form-control" v-model="insert_product.name" placeholder="Name...">
                </div>
                <div class="mb-3 col-6">
                    <label for="value" class="form-label">Value</label>
                    <input type="number" class="form-control" v-model="insert_product.value" placeholder="Value...">
                </div>
            </div>
            <div class="input-group">
                <div class="mb-3 col-6">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" rows="1" v-model="insert_product.description"></textarea>
                </div>
            </div>
            <div class="input-group">
                <div class="mb-3 col-6">
                    <label class="form-label">Image</label>
                    <input class="form-control" name="pinture"  type="file" v-on:change="onImageChange">
                    <img v-bind:src="imagePreview" width="100" height="100" v-show="showPreview"/>
                </div>
                <div class="mb-3 col-6">
                    <label>Category</label>
					<select class="form-control" v-model="insert_product.category">
						<option value="" selected>Seleccione una Categoria</option>
						<option value="computadores">Computadores</option>
						<option value="camaras">Camaras</option>
						<option value="redes">Redes</option>
						<option value="impresoras">Impresoras</option>
						<option value="accesorios">Accesorios</option>
					</select>
                </div>
            </div>
            <div class="input-group">
                <div class="col-12">
                    <button class="btn btn-success">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
export default {

	props:{
		product:{}
	},
    data(){
        return{
            image:'',

            insert_product:{
                name:this.product.name,
                value:this.product.value,
                description:this.product.description,
                url: this.product.image_url,
                category:this.product.category
            },

            mode:false,
            imagePreview: null,
            showPreview: false,
        }
    },
    methods:{
        onImageChange(e){
            this.image = e.target.files[0]


            let reader  = new FileReader();

            reader.addEventListener("load", function () {
                this.showPreview = true;
                this.imagePreview = reader.result;
            }.bind(this), false);

            if( this.image ){


                if ( /\.(jpe?g|png|gif)$/i.test( this.image.name ) ) {

                    console.log("here");
                    /*
                    Fire the readAsDataURL method which will read the file in and
                    upon completion fire a 'load' event which we will listen to and
                    display the image in the preview.
                    */
                    reader.readAsDataURL( this.image );
                }
            }
        },

        async action(){
			let data = new FormData();
			data.append("name", this.insert_product.name)
			data.append("value", this.insert_product.value)
			data.append("description", this.insert_product.description)
			data.append("category", this.insert_product.category)
			data.append("url", this.image, this.image.name)
			axios.post(`/products/store`, data).then(res=>{
				console.log(res)
			}).catch(error=>{
				console.log(error)
			})
		},
    }
}
</script>
