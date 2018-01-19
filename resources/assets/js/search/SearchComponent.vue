<template>
    <div class="relative">
        <input type="text" class="form-control" :placeholder="placeholder">

        <div class="results" v-if="isShowingResults">
            <div class="content">
                <div class="list-group-item">
                    Fuck
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default{
      props:{
        placeholder:{default:'search....'}
      },
       data(){
          return {
              isShowingResults:false
          }
      }
  }  
</script>
<style lang="scss" scoped>
.results{
    width:100%;
    height:100px;
    postion:fixed;
    box-shadow: 1px 3px 4px rgba(0, 0, 0, 0.2);
    z-index:1000;
    background:blue;
    opacity:1;

}
</style>