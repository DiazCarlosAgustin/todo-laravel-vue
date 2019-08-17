<template>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Nuevo trabajo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form v-on:submit.prevent="nuevoTrabajo()">
                    <div class="form-group">
                        <label for="txtInicial" class="text-dark">Iniciales</label>
                        <input type="text" name="txtInicial" class="form-control" id="txtInicial" v-model="iniciales">
                    </div>
                    <div class="form-group">
                        <label for="txtNombre" class="text-dark">Nombre</label>
                        <input type="text" name="txtNombre" class="form-control" id="txtNombre" v-model="nombre">
                    </div>
                    <div class="form-group d-flex">
                        <button type="submit" class="btn btn-nuevo ml-auto">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:'form-trabajo',
    props:['id'],
    data(){
        return{
            iniciales:'',
            nombre:'',
        }
    },
    methods:{
        nuevoTrabajo(){
            const param = {
                id:this.id,
                iniciales: this.iniciales,
                nombre: this.nombre
            };
            console.log(param);
            
            axios.post('http://127.0.0.1:8000/trabajo',param)
                .then(Response =>{
                    const trabajo = Response.data
                    console.log(trabajo);
                    
                    this.$emit('new', trabajo)
                })
                .catch(err =>{
                    console.log(err);
                    
                });
        }
    }
}
</script>