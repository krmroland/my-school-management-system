<template>
    <form  method="post" @submit.prevent="submit">
        <div class="form-row">
            <InputComponent 
             label="Venue" 
             :value.sync="form.venue"
             wrapperClass="col-md-4"
             >
                
            </InputComponent>

            <div class="form-group col-md-8">
                <label for="">CourseUnit</label>
                <select v-model="form.course_unit_id" class="form-control">
                    <option value="">Please select a course Unit</option>
                    <option 
                    v-for="courseUnit in courseUnits"
                        :value="courseUnit.id"
                    >
                        {{ courseUnit.code }}
                        ({{ courseUnit.name }})
                    </option>
                </select>
            </div>
        </div>

       <div class="form-group">
            <button class="btn btn-outline-primary">
                <i class="fa fa-save"></i>
                Save Changes
            </button>
        </div>
    </form>
</template>

<script>
  export default{
    mounted(){
        this.fetchCourseUnits();
    },
      props:['formFields'],
       data(){
          return {
            courseUnits:[],
              form:this.formFields
          }
      },
      methods:{
        fetchCourseUnits(){
            axios.get("/courseUnits").then(({data})=>{
                this.courseUnits=data;
            });
        },
        submit(){
            this.$emit("submit",this.form);
        }
      }
  }  
</script>

<style>

</style>