<template>
    <div class="my-2 card container">
        <div class="card-body row">
            <div class="col-2">
                <input @change.prevent="actualizar" type="checkbox" name="ckEstadoTrue" id="ckEstadoTrue" v-if="tarea.estado == 1" checked>
                <input @change.prevent="actualizar" type="checkbox" name="ckEstadoFalse" id="ckEstadoFalse" v-if="tarea.estado == 0">
            </div>
            <div class="col-10">
                <strike v-if="tarea.estado == 1">
                    <h5>{{tarea.descripcion}}</h5>
                </strike>
                <h5 v-else>{{tarea.descripcion}}</h5>
            </div>
        </div>
        <div class="card-footer text-right" v-if="tarea.updated_at  != null">
            <h6>hace {{tarea.updated_at}}</h6>
        </div>
    </div>
</template>
<script>
export default {
    name:'tarea',
    props:['tarea'],
    data(){
        return{}
    },
    methods:{
        actualizar(){
            
            if(this.tarea.estado == 0){
                
                const param = {
                    estado: 1 
                };  
                axios.put('http://127.0.0.1:8000/tarea/'+ this.tarea.id, param)
                    .then(res =>{
                        this.tarea.estado = 1;
                        this.$emit('updateTarea', this.tarea.estado)
                    })
                    .catch(err =>{
                        console.log(err + "a");
                        
                    })
            }
            else if(this.tarea.estado == 1){
                const param = {
                    estado: 0
                };
                axios.put('/tarea/' + this.tarea.id, param)
                    .then(res =>{
                        this.tarea.estado = 0;
                        this.$emit('updateTarea', this.tarea.estado)
                    })
                    .catch(err =>{
                        console.log(err  + "a");
                        
                    })
            }
        }
    }
}
</script>