<template>
  <modal :show.sync="isCreating" >
    <span slot="title">Create A New Course Unit</span>
    <form action="" v-if="anIntakeIsSelected">
      <InputComponent 
      label="Name"
      placeholder="Course Units Name"
      :value.sync="form.name"
      ></InputComponent>

      <InputComponent 
      label="Code"
      placeholder="Course Units Code"
      :value.sync="form.code"
      ></InputComponent>

      <InputComponent 
      label="Credit Units"
      placeholder="Course Units Credit unit hours"
      :value.sync="form.creditUnits"
      ></InputComponent>

      <InputComponent 
      label="Lecturers name"
      placeholder="Lecturers name"
      :value.sync="form.lecturer"
      ></InputComponent>
      <div class="form-group">
          <label> Faculty</label>
          <select v-model="form.faculty_id" class="form-control">
              <option value="" selected>
              Please select a faculty..</option>
              <option 
              :value="faculty.id"
              v-for="faculty in faculties">
              {{ faculty.code }}
              ({{ faculty.name }})
          </option>
      </select>
  </div>
  <button class="btn btn-primary"
  @click.prevent="save"
  >
  <i class="fa fa-save"></i>
  Save
</button>
</form>

<div class="alert alert-info" v-else>
  Please Select A Semester to proceed
</div> 
</modal>
</template>

<script>
export default {
  mounted() {
    window.globalBus.$on("creatingNewCourseUnit", yes => {
      this.isCreating = true;
      if (this.faculties.length == 0) {
        this.fetchFaculties();
      }
    });
  },
  data() {
    return {
      isCreating: false,
      faculties: [],
      form: {
        name: "",
        faculty_id: "",
        code:'',
        creditUnits:'',
        lecturer:''
      }
    };
  },
  methods: {
    resetForm(){
      for (let prop in this.form) {
        this.form[prop]=''
      }
    },
    fetchFaculties() {
      axios
        .get("/faculties")
        .then(({ data }) => (this.faculties = data))
        .catch(error => flash.error("Something went wrong"));
    },
    save() {
      axios
        .post("/courseUnits", this.form)
        .then(({ data }) => {
          this.$emit("added", data);
          this.isCreating=false;
          this.resetForm();
          flash.success("Course unit wa added successfully");
        })
        .catch(({ response }) => {
          console.log(response);
          flash.errors(response.data.errors);
        });
    }
  }
};
</script>

<style>

</style>