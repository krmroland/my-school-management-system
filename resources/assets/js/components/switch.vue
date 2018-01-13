<template>
    <label class="switch">
      <input type="checkbox" :checked="checked"  @change="$emit('changed',checked)" 
        v-model="checked">
      <span class="slider round"></span>
    </label>
</template>

<script>
export default{
  props:['isChecked'],
  data(){
        return{
            checked:this.isChecked
        }
  }
}  
</script>

<style scoped lang="scss">
@import "resources/assets/sass/variables";
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  transition: .4s;
}

input:checked + .slider {
  background-color: theme-color('primary');
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>