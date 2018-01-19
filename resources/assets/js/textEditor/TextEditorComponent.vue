<template>
    <div class="editor">
      <!-- menus-->
      <div class="menus ">
        <div class="flex-between">
          <a href="" @click.prevent="save">
            <i class="fa fa-save" title="Save Document"></i>
          </a>
            <select 
              v-for="menu in toolbar.menus" 
              class="form-control"
              @change="formatSelection(menu,$event.target.value)"
              >
              <option selected value="">{{ menu.header }}</option>
              <option 
                v-for="value,key in menu.values" 
                :value="key"
                v-html="value"
              >
         
              </option>
            </select>
            <a href="" class="close mx-2"
             @click.prevent="$emit('close')">
              <i class="fa fa-times"></i>
            </a>
        </div>
        <hr  class="p-0 m-0">
        <!-- buttons -->
        <div class="flex-between px-2">
          <a 
          href="#"
           v-for="button in toolbar.buttons"
           :title="button.text" 
           @click.prevent="executeButton(button)"
           >
            <i class="fa" :class="button.icon"></i>
          </a>
        </div>
      </div>
      <div class="body">
        <slot></slot>
        <div contenteditable="true" class="a4-content"
          @input="updateHtml" 
        v-html="initialDoc">
          
        </div>
      </div>
   
</div>
</template>

<script>
import { toolbar } from "./toolbar";
import debounce from "lodash/debounce";

export default {
  props:["contents"],
  mounted() {
    //document.body.classList.add("no-overflow");
  },
  data() {
    return {
      initialDoc: this.contents,
      editedDoc:'',
      toolbar
    };
  },
  methods: {
    updateHtml(event){
      this.editedDoc=event.target.innerHTML;

    },
    formatSelection(menu,value){
     if (value=="") {
      return;
     }
      document.execCommand(menu.command,true,value);

    },
    executeButton(button) {
      const command = button.command;
      let value = null;
      if (command == "formatBlock") {
        value = "<blockquote>";
      }
    document.execCommand(command, true, value);

    },
    formated() {
      return this.$refs.doc.innerHTML;
    },
    save(){
      this.$emit("save",this.editedDoc);
    },
    lazySave:debounce(function($vm){
        $vm.save();
    },1500)
  },
  watch:{
    editedDoc(value){
      this.lazySave(this)
    }
  }
};
</script>

<style scoped lang="scss">
@import "resources/assets/sass/variables";

.editor{
 
  .menus{
     background: rgb(204,204,204) ; 
    position:fixed;
    right:5px;
    left:5px;
    top:80px;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.5);
    z-index:1000;
    select.form-control{
     background-color:$gray-100;
     height:30px;
     font-size:1rem;
     border-radius:2px;

    }

  }
  .body{
    z-index:999;
    background: rgb(204,204,204) ; 
    position:fixed;
    right:5px;
    top:135px;
    left:5px;
    bottom:5px;
    overflow-y:scroll;
  
    .a4-content{
    margin-top: 40px;


     }
     
  }
  
   //height:100vh;




}
</style>
