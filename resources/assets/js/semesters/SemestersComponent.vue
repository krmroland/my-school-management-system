<template>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <strong> Active Semester: </strong> 
      <span class="text-info" v-if="semesters.length"> 
        {{ active.fullName }}
      </span>
      <span class="text-info" v-else>
        No Registered semesters
      </span>
      </a>
      <div class="dropdown-menu  dropdown-menu-right">
        <template v-for="semester in semesters">
            <SemesterComponent :data="semester" :active="active">
                
            </SemesterComponent>
        </template>
        <div class="dropdown-divider" v-if="semesters.length>0"></div>
        <a class="dropdown-item" href="#" 
        @click.prevent="createSemester">
            <i class="fa fa-plus"></i>
            New semester
        </a>
      </div>
     
    </li>
</template>

<script>
import SemesterComponent from "./SemesterComponent";

  export default{
    components:{SemesterComponent},

      props:["semesters","active"],
      methods:{
        createSemester(){
            globalBus.$emit("createNewSemester");
        }
      }
  }  
</script>

<style>

</style>