<template>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Nueva tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form v-on:submit.prevent="agregarTarea()">
                    <div class="form-group">
                        <label for="">Descripcion:</label>
                        <input type="text" class="form-control" name="txtDescripcion" id="txtDescription" v-model="description">
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
    name: 'add-tarea',
    props:['trabajo'],
    data(){
        return{
            description: ''
        }
    },
    methods: {
        agregarTarea(){
            const  param = {
                trabajo_id: this.trabajo,
                descripcion: this.description
            }
            axios.post('/tarea',param)
                .then(res => {
                    this.$emit('nuevaTarea',res.data)
                })
                .catch(err =>{
                    console.log(err);
                    
                })
        }
    }
}
</script>