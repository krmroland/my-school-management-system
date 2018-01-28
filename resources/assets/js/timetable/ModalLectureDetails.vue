<template>
    <modal :show.sync="store.isShowingDetails">
        <span slot="title" v-text="title"></span>
        <div class="flex-end">
            <h2 v-if="details" class="mr-auto text-info">
                {{ details.course_unit.name }}
                ({{ details.course_unit.code }})
            </h2>
            <div class="btn-group">
                <button 
                    class="btn btn-outline-secondary btn-sm"
                    v-if="details"
                    title="Delete this record"
                    @click.prevent="removeEntry"
                    :disabled="isProcessing"
                >
                <i class="fa fa-trash"></i>
                </button>
                <button 
                    class="btn btn-outline-primary btn-sm"
                    :title="btnTitle"
                    @click="isEditting=!isEditting"
                    :disabled="isProcessing"
                >
                    <i class="fa" :class="btnIcon"></i>
                </button>
            </div>
            
        </div>
        <hr class="m-1">
        <LectureForm 
            v-if="isEditting" 
            :formFields="formFields"
            @submit="saveChanges"
        ></LectureForm>

        <div v-else>
            <template v-if="details">
                <div class="card mt-2" v-for="card in detailCards" >
                   <div class="card-body">
                       <div class="flex-between">
                           <p class="h4"> 
                                   <i class="fa fa-2x" 
                                   :class="card.icon"></i>
                           </p>
                            <h2 v-text="card.label"></h2>
                           <p class="h4" v-text="card.value"></p>
                       </div>
                   </div> 
                </div>
            </template>
            
            <div class="alert alert-secondary" v-else>
                <i class="fa fa-info"></i>
                No details captured for this period
            </div>
            
           
        </div>
    </modal>
</template>

<script>
import LectureForm from "./LectureForm";
import store from "./store";

  export default{
    components:{LectureForm},
       data(){
          return {
              store,
              isEditting:false,
              isProcessing:false
          }
      },
      computed:{
        details(){
            return this.store.lectureDetails.details
        },
        props(){
            return this.store.lectureDetails.props
        },
        hour(){
            return this.props.hour;
        },
        day(){
            return this.props.day;
        },
        title(){
            return this.day + ' ' +this.hour.hour + ' ' +this.hour.dayTime;
        },
        btnTitle(){
            return this.isEditting?'Close Form':'Edit details'
        },
        btnIcon(){
            if (this.isProcessing) {
                return 'fa-spinner fa-spin';
            }
            return this.isEditting?'fa-close':'fa-edit';
        },
        formFields(){
            let fields={venue:'',course_unit_id:''};
            if (this.details) {
                fields.venue=this.details.venue
                fields.course_unit_id=this.details.course_unit_id;
            }
            return fields;
        },
        detailCards(){
            let cards=[];
            if (!this.details) {
                return cards;
            }
            //venue
            cards.push({icon:'fa-home',label:'Venue',value:this.details.venue});
            //lecturer card
            cards.push({icon:'fa-user',label:'Lecturer',value:this.details.course_unit.lecturer})
            //credit units
           cards.push({icon:'fa-history',label:'Credit Units',value:this.details.course_unit.creditUnits})
            return cards;
        }

      },
      methods:{
        removeEntry(){
            this.isProcessing=true;

            const url =`/timetable/${this.details.id}`
            axios.delete(url).then(({data})=>{
                this.isProcessing=false;
                flash.success("Deletion was successful");
                store.updateTimetable(data);
            }).catch(errors=>{
                flash.error("something went wrong")
                console.log(errors.response);
                this.isProcessing=false;
                
            })
        },
        saveChanges(data){
            this.isProcessing=true;
            axios
            .post("/timetable",this.addFieldsToFormData(data))
            .then(({data})=>{
                this.isEditting=false;
                this.isProcessing=false;
                flash.success("Update was successful");
                store.updateTimetable(data);
            }).catch(errors=>{
                flash.errors(errors.response.data.errors);
                console.log(errors.response)
                this.isProcessing=false;
            });
        },
        addFieldsToFormData(data){
            data.hour=this.hour.hour;
            data.dayTime=this.hour.dayTime;
            data.day= this.day;
            return data;

        }
      }
  }  
</script>

<style>

</style>