<template>

</template>

<script>
  export default{
          
      mounted(){
        this.anounceItemsChanged()
      },
       data(){
          return {
              paginator:this.dataPaginator.data
          }
      },
      methods:{
        anounceItemsChanged(){
            if (hasOwnProp(this.paginator,"data")) {
                this.$emit("itemsChanged",this.paginator.data)
            }
        }
      },
      watch:{
        dataPaginator(){
            this.anounceItemsChanged();
        }
      }
  }  
</script>

<style>

</style>