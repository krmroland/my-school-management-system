<template>
     <modal :show.sync="isCreating" @closed="isCreating=false">
          <span slot="title">Create A New Semester</span>
          <!-- semesters name -->
          <InputComponent
                label="Semester Name"
                :value.sync="form.name"
                placeholder="Eg Semester 1"
          ></InputComponent>
          <!-- semesters academic year-->
            <InputComponent
                label="Semetsers Academic Year"
                :value.sync="form.academic_year"
                placeholder="Academic Year eg 2017 to 2018"
              ></InputComponent>
        
              <DateComponent 
                label="Select semesters running dates"
                mode="range" :value.sync="form.dates">
                </DateComponent>


          <button slot="button" class="btn btn-primary" @click="save">
              <i class="fa fa-save"></i>
              Add A new Cycle
          </button>
      </modal>
</template>

<script>
export default {
    data() {
        return {
            form: {
                dates:'',
                name:'',
                academic_year:''
            },
            isCreating: false
        };
    },
    mounted(){
        window.globalBus.$on("createNewSemester",()=>{
            this.isCreating=true;

        })
    },
    methods: {
        save() {
            axios
                .post("/semesters", this.form)
                .then(({data}) => {
                    // flash.success("Semester was added successfully");
                    // this.isCreating = false;
                    // console.log(data)
                     window.location.reload();
                })
                .catch(errors => {
                    console.log(errors.response.data);
                    flash.errors(errors.response.data.errors);
                });
        }
    }
};
</script>

<style>

</style>