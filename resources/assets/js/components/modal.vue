<template>
  <!-- Modal -->
  <div class="modal fade"  tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">
              <slot name="title"></slot>
          </h5>
          <button type="button" class="close"  data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <slot></slot>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary"
          data-dismiss="modal">Close</button>
          <slot name="button"></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default{
  props:["show"],
  props:{
    show:{default:false}
  },
   data(){
      return {
          shouldShow:this.show
      }
  },
  computed:{
    element(){
      return $(this.$el);
    }
  },

  mounted(){
    if (this.show) {
        this.element.modal('show');
    }
    this.element.on('hidden.bs.modal',  (e)=> {
       this.$emit("update:show",false);
    })
  
  },

    data(){
      return {
        shouldShow:this.show
      }
    },
    methods:{
        close(){
            this.$emit('closed')
            
        }
    },
    watch:{
      show(shouldShow){
        if (shouldShow) {
          this.element.modal('show');

        }else{
          this.element.modal('hide');
        }

        this.$emit("update:show",shouldShow);
      }
    }
}  
</script>

<style scoped lang="scss">
@import "resources/assets/sass/variables";

</style>