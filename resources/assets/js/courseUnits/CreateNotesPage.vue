<template>

      <form method="POST" 
            @submit.prevent="$emit('onSubmit',{date})">
            
                <DateComponent
                 :value.sync="date" 
                 label="Please select a date">
                 </DateComponent>

                 <div class="form-group">
                     <button class="btn btn-primary" >
                         <i class="fa fa-save"></i>
                         Save
                     </button>
                 </div>
          
      </form>

</template>

<script>
  export default{
       data(){
          return {
              date:'',
          }
      }
  }  
</script>

<style>

</style>