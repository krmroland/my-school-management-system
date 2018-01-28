<template>
    <tr :class="{'bg-secondary  text-white':isFixedHour}">
        
        <th>
             {{ hour.hour  }} {{ hour.dayTime }}
        </th>
        <template v-if="isFixedHour">
            <th 
             :colspan="store.selectedDaysCount" 
             class="text-center">
               <strong> {{ hour.isFixedThrought }}</strong>
            </th>
        </template>
        <template v-for="day in store.days.selected" v-else>
            <LectureDetails 
             :hour="hour"
             :day="day"
             ></LectureDetails>
        </template>
    </tr>
</template>

<script>
import store from "./store";
import LectureDetails from "./LectureDetails";


  export default{
      props:["hour"],
      components:{LectureDetails},
       data(){
          return {
              store
          }
      },
      computed:{
        isFixedHour(){
            return hasOwnProp(this.hour,'isFixedThrought');
        }
      }
  }  
</script>

<style>

</style>