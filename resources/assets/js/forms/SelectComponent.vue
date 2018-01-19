<template>
    <div class="form-group">
        <label v-if="label">{{ label}}</label>
        <select :name="name">
            <option value="" v-for="item in items"></option>
        </select>
        <input :type="type" class="form-control"
         :value="value"
         @input="updateValue"
         :placeholder="placeholder"
         >
    </div>
</template>

<script>
export default {
    props: {
        label: { default: '' },
        value: {},
        type:{default:'text'},
        placeholder:{default:''},
        name:{default:''},
        ValueFormater:{},
        Formatter:{},

    },
    data(){

    },

    methods: {
        updateValue(e){
             this.$emit("update:value",e.target.value)
           }
    }
};
</script>

<style>

</style>