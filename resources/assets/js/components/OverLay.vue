<template>
    <div v-if="show">
      <div class="overlay">
        <icon-spinner></icon-spinner>
        <span class="h4 ml-2">{{ text }}</span>
      </div>
    </div>
</template>

<script>
  export default{
      props:['text','show'],
      mounted(){
        document.addEventListener('keydown', (event)=>{
            if (event.keyCode===27) {
                this.$emit("escaped")
                this.$emit("update:show",false);
            }
        })
      }
  }  
</script>
<style scoped>
.overlay {
    position: fixed;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1500;
    background-color: #8e44ad;
}
</style>