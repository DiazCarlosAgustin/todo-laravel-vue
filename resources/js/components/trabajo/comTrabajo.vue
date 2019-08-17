<template>
    <div @click="trabajoSeleccionado">
        <div class="card mb-3">
            <h1 class="my-auto">{{trabajo.iniciales}}</h1>
        </div>
        <h4 class="text-center">{{trabajo.nombre}}</h4>
    </div>
</template>
<script>
import { log } from 'util';
export default {
    name:'trabajo',
    props:['trabajo'],
    data(){
        return{
        }
    },
    methods:{
        trabajoSeleccionado(){
            console.log(this.trabajo.nombre);
            this.$emit('seleccionado',this.trabajo)
            
        }
    }
}
</script>
<style scoped>
    .card{
        background:linear-gradient(to right top, #FE4266, #FC9D9A);
        height: 125px;
        text-align: center;
        border-radius: 0;
        border-bottom-left-radius: 25px;
        border-top-right-radius: 25px;
    }
</style>
