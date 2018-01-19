<template>
     <a 
            class="dropdown-item" 
            href="#" 
            @click.prevent="activateSemester"
            >
            <i class="fa fa-check" v-if="isActive"></i>
            <span 
            :class="{'ml-3':!isActive}">{{ data.fullName}}</span> 
        </a>
</template>

<script>
  export default{
    props:['data'],

      computed:{

        isActive(){
            return this.data.id== this.activeSemester.id ;
        }
      },
      methods:{
        activateSemester(semester){
            axios.post(`/activateSemester/${this.data.id}`).then(response=>{
                window.location.reload();
            }).catch(errors=>{
                console.log(errors.response.data);
                flash.error("Something went wrong")
            })
        }
      }
  }  
</script>

<style>

</style>