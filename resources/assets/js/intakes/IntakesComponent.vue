<template>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <strong> Active Intake: </strong> 
      <span class="text-info" v-if="intakes.length"> 
        {{ activeIntake.semester.fullName }}
      </span>
      <span class="text-info" v-else>
        No Registered semesters to intake
      </span>
      </a>
      <div class="dropdown-menu  dropdown-menu-right">
        <template v-for="intake in intakes">
            <IntakeComponent :data="intake.semester">
                
            </IntakeComponent>
        </template>
        <div class="dropdown-divider" v-if="intakes.length>0"></div>
        <a class="dropdown-item" 
          href="#" 
          @click.prevent="createIntake">
            <i class="fa fa-plus"></i>
            New Intake
        </a>
      </div>
     
    </li>
</template>

<script>
import IntakeComponent from "./IntakeComponent";

  export default{
    components:{IntakeComponent},

      props:["intakes"],
      methods:{
        createIntake(){
            window.globalBus.$emit("createNewIntake");
        }
      }
  }  
</script>

<style>

</style>