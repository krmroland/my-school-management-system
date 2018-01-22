<template>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="btn-group">
                        <button 
                        class="btn btn-outline-primary" 
                        @click="toDropBox">
                            <i class="fa fa-dropbox"></i>
                            Dropbox Backup
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="fa fa-usb"></i>
                           Off line backup
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="fa fa-history"></i>
                          Restore BackUp
                        </button>
                    </div>
                  
                </div>
                
            </div>
        </div>
    </div>
  
</template>

<script>
import Dropbox from "dropbox";
const isOnline=function computerIsOnline(){
    const nativeOnline=navigator.onLine;
   if (nativeOnline!==undefined) {
    return nativeOnline;
   }
}
  export default{
      methods:{
        toDropBox(){
            if (!isOnline()) {
                flash.error("Please Make sure you have an Internet working connection");
                return
            }
            //get the database
            axios.get("/backups").then(({data})=>{
               this.dropboxInstance.filesUpload(data)
            })
            
        }
      },
      computed:{
        dropboxInstance(){
            return new Dropbox({ accessToken: window.MySchool.DROPBOX_TOKEN });
        }
      }
  }  
</script>

<style>

</style>