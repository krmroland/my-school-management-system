<template>
     <div class="plus-btn btn-group-vertical btn-group-lg">
            <button 
                @click.prevent="$emit('isCreating')"
                title="Add Page"  
                class="btn btn-outline-primary btn-lg">
                <i class="fa fa-plus fa-lg"></i>
            </button>
            <GeneratePdfIconComponent :courseUnit="courseUnit">
            </GeneratePdfIconComponent>
            <button 
                 title="Previous Pages" 
                 class="btn btn-outline-primary btn-lg"
                 :disabled="!hasPrevPage || isFetching"
                 @click="prevPage"
                 >
                <i class="fa fa-lg" :class="previousIcon"></i>
            </button>

            <button  
                title="Next Pages"
                @click.prevent="nextPage" 
                class="btn btn-outline-primary btn-lg"
                :disabled="!hasNextPage || isFetching"
            >
                <i class="fa  fa-lg" :class="nextIcon"></i>
            </button>

        </div>

</template>

<script>

import SimplePaginatorMixin 
from "../pagination/SimplePaginatorMixin";
import GeneratePdfIconComponent from "./GeneratePdfIconComponent";

export default  SimplePaginatorMixin.extend({
    components:{GeneratePdfIconComponent},

    props:['courseUnit','dataPaginator'],
     data(){
        return {
         
            paginator: this.dataPaginator
        }
    },
    computed:{
        nextIcon(){
             return this.determineIcon("fa-arrow-right")
        },
        previousIcon(){
           return this.determineIcon("fa-arrow-left")
        },

    },
    methods:{
    },
    watch: {
        dataPaginator(dataPaginator) {
            this.paginator=dataPaginator
            this.anounceItemsChanged();
        }
    }
})
</script>


<style lang="scss" scoped>
    .plus-btn{
        position: fixed;
        right:5px;
        top:80px;
        bottom:0;
    }
</style>