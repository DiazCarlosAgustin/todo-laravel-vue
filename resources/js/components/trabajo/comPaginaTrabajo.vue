<template>
    <div class="row mt-4 ">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 p-0 pl-3">
            <div class="head ">
                <h1>Bienvenido <span>{{ user.name }}</span></h1>
                <h3>Tienes trabajos por completar</h3>
            </div>
            <div class="body mt-3">
                <button class="btn btn-nuevo btn-lg" data-toggle="modal" data-target="#exampleModal">Nuevo trabajo</button>
            </div>
            <div class="trabajos mt-5">
                <h3>Trabajos (<span class="h4">{{trabajos.length }}</span>)</h3>
                <div class="row mt-3 trabajo">
                    <trabajo v-for="trabajo in trabajos" 
                        :key="trabajo.id" :trabajo="trabajo"
                         class="col-3 mx-2" @seleccionado="focusTrabajo">
                    </trabajo>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 p-0 ">
            <pagina-tarea :trabajo="setTrabajo"></pagina-tarea>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form-trabajo @new="addTrabajo" :id="user.id"></form-trabajo>
        </div>
    </div>
</template>
<script>
import { log } from 'util';
export default {
    name:'pagina-trabajo',
    props:['user'],
    data(){
        return{
            trabajos:[],
            setTrabajo:0
        }
    },
    mounted(){
        axios.get('http://127.0.0.1:8000/trabajos')
            .then((Response)=>{
                this.trabajos = Response.data;
            })
            .catch(error =>{
                console.log(error);
            });
        
    },
    methods:{
        addTrabajo(trabajo){
            this.trabajos.push(trabajo)
        },
        focusTrabajo(trabajo){
            this.setTrabajo = trabajo.id
              
        }
    }
}
</script>
<style scoped>
    .row{
        margin:0;
    }
    .btn-nuevo{
        background: #F2545B;
        color:white;
    }
    .trabajo{
        max-height: 300px;
        overflow: auto;
    }
</style>
