<template>
    <div class="sidebar-contents">
        <div class="list-group mb-1" v-if="aSemesterIsSelected">
            <a href="#" class="list-group-item list-group-item-action"
            @click.prevent="activateCreating"

            >
                <i class="fa fa-plus"></i>
                New Course Unit
            </a>
        </div>
       <h5 class="text-center"><strong>Course Units</strong></h5>
        <div class="list-group">
            <template v-for="courseUnit,index in courseUnits">
              <SideBarCourseUnitItem
                :dataCourseUnit="courseUnit"
                @activated="activateCourseUnit"
                :index="index"
                :activeIndex="activeIndex"
                >
              </SideBarCourseUnitItem>
            </template>
        </div>
    </div>
    </div>
    
</template>

<script>

import SideBarCourseUnitItem from "./SideBarCourseUnitItem";

export default {
  components: {SideBarCourseUnitItem },
  props:['courseUnits'],

  data() {
    return {
      activeIndex:null,
    };
  },
  methods: {

    activateCreating(){
      this.isCreating=true;
      window.globalBus.$emit("creatingNewCourseUnit")
    },
    activateCourseUnit(index){
      this.activeIndex=index;
      this.$emit("activatedIndex",index);
    }
  }
};
</script>

<style>

</style>