<template>
    <div>
        <CourseUnitsComponent></CourseUnitsComponent>
    </div>
</template>

<script>
import CourseUnitsComponent from "../courseUnits/CourseUnitsComponent";
  export default{
      components:{CourseUnitsComponent},
      props:["courseUnits"]
  }  
</script>

<style>

</style>