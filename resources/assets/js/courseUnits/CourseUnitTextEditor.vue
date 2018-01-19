<template>
   <TextEditorComponent
     @close="$emit('update:editableIndex',null)"
     :contents="editablePage.contents"
     @save="saveChanges"
    >
    <h4 class="text-center text-info mt-3">
            Date: <span v-text="editablePage.date"></span>
            ({{ courseUnitName }})
    </h4>
     
 </TextEditorComponent>
</template>

<script>
  export default{
    props:['notes','editableIndex','courseUnitName'],

      computed:{
        url(){
            const editablePage=this.editablePage;
            return editablePage
              ? `/courseUnit/${editablePage.course_unit_id}/notes/${editablePage.id}`
              :null;
        },
        editablePage(){
            return this.notes[this.editableIndex]
        }
      },
       methods:{
        saveChanges(contents){
            axios.put(this.url,{contents}).then(done=>{
                this.$emit(
                   "updatePageNotes",
                   {index:this.editableIndex,contents}
                );
            }).catch(error=>flash.error("Something went wrong while saving the notes"));
        }
    }
  }  
</script>

<style>

</style>