<template>
    <td class="detail" @click="clicked">
        <span v-text="simplifiedDetail"></span>
    </td>
</template>

<script>
import store from "./store";

  export default{
    props:['hour','day'],
       data(){
          return {
              store
          }
      },
      computed:{
        simplifiedDetail(){
            if (this.detail) {
                return this.detail.course_unit.code + ' ' +this.detail.venue;
            }
            return "--";
        },
        detail(){
           
            return this.store.serverTimetable
            .timetable_lectures.find((item,index)=>{
                return !!(
                    item.day==this.day 
                        &&
                   item.hour== +this.hour.hour
                        &&
                item.dayTime==this.hour.dayTime);
           
            });

        }
      },
      methods:{
        clicked(){
            this.store.showLectureDetails(this.$props,this.detail);
        }
      }
  }  
</script>

<style scoped lang="scss">
.detail{
    &:hover{
        cursor:pointer;
    };
}
</style>