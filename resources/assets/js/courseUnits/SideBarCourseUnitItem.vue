<template>
    <a 
        class="list-group-item list-group-item-action"
        :class="{'border-left':isActive}"
        href="#"
        @click.prevent="activateCourseUnit">
        {{ courseUnit.name }}
    </a>
</template>

<script>
export default {
    props: ["dataCourseUnit","index","activeIndex"],
    data() {
        return {
            courseUnit: this.dataCourseUnit
        };
    },
    computed:{
        isActive(){
            return this.activeIndex==this.index;
        }
    },
    methods:{
        activateCourseUnit(){
            this.$emit("activated",this.index)
        }
    }
};
</script>

<style>

</style>