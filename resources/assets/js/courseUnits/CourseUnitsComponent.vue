<template>
    <div class="row">
        <div class="col-md-3 sidebar">
           <SideBarCourseUnits
            :courseUnits="courseUnits"
            @activatedIndex="selectedCourseUnitIndex=$event"
        ></SideBarCourseUnits>  
        </div>
        <div class="col-md-9 ml-auto pt-3 px-2">
              <CreateCourseUnitComponent
                @added="setCourseUnits"
            ></CreateCourseUnitComponent>
            <DisplayNotesComponent
             v-if="selectedCourseUnit"

             :courseUnit="selectedCourseUnit"
            ></DisplayNotesComponent>
            <div class="alert alert-info" v-else>
                Course Units Summary will go here
            </div>
        </div>
    </div>
</template>

<script>
import SideBarCourseUnits from "./SideBarCourseUnits";
import DisplayNotesComponent from "./DisplayNotesComponent";

import CreateCourseUnitComponent from "./CreateCourseUnitComponent";
export default {
    components: {
        CreateCourseUnitComponent,
        SideBarCourseUnits,
        DisplayNotesComponent
    },
    props: ["dataCourseUnits"],

    mounted(){
      
    },
    data() {
        return {
            selectedCourseUnitIndex: null,
            courseUnits: this.dataCourseUnits
        };
    },
    computed: {
        selectedCourseUnit() {

            return this.courseUnits[this.selectedCourseUnitIndex] ;
        }
    },
    methods: {
        setCourseUnits(courseUnits) {
            this.courseUnits = courseUnits;
        }
    }
};
</script>

<style>
</style>