<template>
    <div>
   
     <div v-if="anIntakeIsSelected" class=" m-2">
         <ModalLectureDetails 
            v-if="store.isShowingDetails"
        ></ModalLectureDetails>
        <DaysAndHours></DaysAndHours>
        <div class="card mt-1" v-if="store.selectedDaysCount>0">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th 
                                v-for="day,index in store.days.selected"
                            >
                                {{ day }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- morning hours -->
                        <HourlyComponent 
                         :hour="hour"
                          v-for="hour,index in store.hours.selected"
                          :key="hour.hour">
                        </HourlyComponent>
                      
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    <div v-else class="alert alert-secondary mt-3">
      
        <h3>
            <i class="fa fa-info"></i>
            <strong>Please Select an intake</strong>
        </h3>
    </div>
</div>
</template>

<script>
import HourlyComponent from "./HourlyComponent";
import DaysAndHours from "./DaysAndHours";
import ModalLectureDetails from "./ModalLectureDetails";
import store from "./store"

  export default{
      props:["intake"],
      components:{HourlyComponent,DaysAndHours,ModalLectureDetails},

       data(){
          return {
              store
          }
      },
      created(){
          this.store.updateTimetable(this.intake)
      }
  }  
</script>

<style>

</style>