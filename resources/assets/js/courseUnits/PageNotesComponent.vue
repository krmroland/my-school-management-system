<template>
        <div  class="a4-content relative">
            <div class="flex-center">
             <a href="#" @click.prevent="$emit('edit')"
               title='Edit document'
             ><i class="fa fa-edit"></i></a> 
            </div>
            <h4  class="m-0 flex-between">
                <strong v-text="courseUnitName" 
                class="text-info mx-auto ">
                </strong>
                <span>
                    <strong>Date:</strong>
                    <span v-text="pageNotes.date"></span>
                </span>
            </h4>
            <div class="line mb-2"></div>

     <span v-html="pageNotes.contents"></span>
    </div>
 
</div>
</template>

<script>
export default{
    props:["pageNotes","courseUnitName"]
}  
</script>

<style lang="scss">
@import "resources/assets/sass/variables";
.line{
    border: 4px double $primary;
}
</style>