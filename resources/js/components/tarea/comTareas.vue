<template>
    <div class="body m-0 p-0 text-muted">
        <div class="text-center mt-2">
           <h2 v-if="trabajo == 0">Seleccione un trabajo</h2>
           <h2 v-else>Tareas <span> ( {{tareas.length}} )</span></h2>
        </div>
        <div class="mt-4 tareas">
            <tarea v-for="(tarea,index) in tareas" :key="tarea.id" :tarea="tarea" @updateTarea="actualizarTareas(index, ...arguments)"/>
        </div>
        <div class="div-add" v-if="trabajo > 0">
            <button class="btn btn-add" data-toggle="modal" data-target="#exampleModal2">
                <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
            <add-tarea :trabajo="trabajo"
                @nuevaTarea="addTarea"/>
        </div>
    </div>
</template>
<script>
export default {
    name:'pagina-tarea',
    props:['trabajo'],
    data(){
        return{
            tareas:[]
        }
    },
    beforeUpdate(){
        axios.get('http://127.0.0.1:8000/tarea/' + this.trabajo)
            .then(res =>{
                this.tareas = res.data
                
            })
            .catch(err =>{
                console.log(err);
                
            })
    },
    methods:{
        actualizarTareas(index,tarea){
            this.tareas[index].estado = tarea
        },
        addTarea(tarea){
            this.tareas.push(tarea)
        }
    }
}
</script>
<style scoped>
    .body{
        background-color: white;
        color:black;
        width: 100%;
        min-height:100vh;
        height: 100%;
        border-top-right-radius: 25px;
        border-top-left-radius: 25px;
        overflow: auto;
    }
    @media (min-width: 980px){
        .body{
            background-color: white;
            color:black;
            width: 100%;
            min-height:84vh;
            max-height: 85vh;
            height: 100%;
            border-radius: 25px;
            overflow: auto;
        }
    }
    .tareas{
        height:80%;
        overflow: auto;
    }
    .div-add{
        position: absolute;
        top:90%;
        right: 5%;
    }
    .btn-add{
        border: none;
        border-radius: 50%;
        height: 50px;
        width: 50px;
        background: #870087;
        color:white;
    }
</style>
