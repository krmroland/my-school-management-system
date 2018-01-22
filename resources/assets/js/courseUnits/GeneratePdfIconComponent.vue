<template>
    <button 
         @click.prevent="generate" 
         title="Generate Pdf" 
         class="btn btn-outline-primary btn-lg"
         :disabled="isGenerating"
    >
        <i class="fa fa-lg" :class="icon"></i>
    </button>

</template>

<script>

  export default{
    props:['courseUnit'],
       data(){
          return {
                isGenerating:false
          }
      },
      computed:{
        icon(){
            return this.isGenerating?  'fa-spin fa-circle-o-notch' :'fa-file-pdf-o';
        }
      },
      methods:{
        generate(){
            flash.confirm("This operation might take a couple of few minutes","Proceed?").then(this.proceedToGenerate)
            
        },
        proceedToGenerate(){
            this.isGenerating=true;

            axios({
                method: "get",
                url: `courseUnits/${this.courseUnit.id}/pdf`,
                responseType: "arraybuffer"
            })
                .then(({ data }) => {
                    const blob = new Blob([data], {
                        type: "application/pdf"
                    });
                    const link = document.createElement("a");
                    link.href = window.URL.createObjectURL(blob);
                    link.download = `${this.courseUnit.name}.pdf`;
                    link.click();
                    this.isGenerating = false;
                })
                .catch(errors => {
                    this.isGenerating = false;
                    flash.error("Something went wrong");
                });
        }
      }
  }  
</script>

<style>

</style>