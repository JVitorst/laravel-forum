<template>
    <div id="preloader" v-show="counter > 0" >
        <div class="image">
            <img src="/img/loader.gif" >
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                counter: 0
            }
        },
        mounted(){
            axios.interceptors.request.use((config) => {
                //Acresce o counter - ou seja tem requisição
                this.counter ++;
                return config;
            }, (error) =>{
                return Promise.reject(error);
            })
            axios.interceptors.response.use((response) => {
               //Descresce o counter - ou seja a requisicação ja foi respondida
                this.counter --;
                return response;
            }, (error) =>{
                this,counter --;
                return Promise.reject(error);
            })
        }
    }
</script>

<style>
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.5) ;
    }
    #preloader .image{
        position: absolute;
        top: 50%;
        left: 50%;
        width: 450px;
        height: 300px;
        transform: translate( -50%, -50%);

        overflow: hidden;
    }
</style>