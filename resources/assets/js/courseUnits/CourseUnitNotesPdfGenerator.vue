<template>
    <a href="#" @click="generatePdf" title="Generate Pdf">
        <i class="fa fa-3x" :class="icon"></i>
    </a>
</template>

<script>
const icons={
    INITIAL:'fa-file-pdf-o',
    FETCHING:'fa-circle-o-notch fa-spin'
}
export default{
    props:['courseUnit'],
     data(){
        return {
            icon:icons.INITIAL  
        }
    },
    methods:{
        generatePdf(){
            this.icon=icons.FETCHING;
            setTimeout(done=>this.icon=icons.INITIAL, 1000)

        }
    }
}  
</script>

<style>

</style>