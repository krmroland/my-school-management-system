<template>
    <div class="card">
        <div class="card-body">
           <!--  days -->
            <div  class="flex-between align-items-center">
                <p>Days:</p>
                <div  
                    v-for="day ,index in store.days.all">
                    <input 
                        type="checkbox"
                        :value="day" 
                        :checked="store.days.selectedHas(index)"
                        @change="store.days.updateSelected($event,index)"
                        >
                        <label v-text="day"></label>
                </div>
                <div>
                    <input 
                        type="checkbox" value="all"
                        @change="store.days.selectAll($event.target.checked)"
                        
                        >
                    <label >Select All</label>
                </div>
               
            </div>
            <hr class="m-1">
            <!-- hours -->

            <div  class="flex-between align-items-center">
                <p>Hours:</p>
                <div  
                    v-for="hour ,index in store.hours.all">
                    <input 
                        type="checkbox"
                        :value="hour.hour"
                        @change="store.hours.updateSelected($event,index)"
                        :checked="store.hours.selectedHas(index)"
                        >
                        <label>
                            {{ hour.hour }}{{  hour.dayTime }}
                        </label>
                </div>
            </div> 
        </div>

    </div>
</template>

<script>
import store from "./store";

  export default{
       data(){
          return {
              store
          }
      }
  }  
</script>

<style>

</style>