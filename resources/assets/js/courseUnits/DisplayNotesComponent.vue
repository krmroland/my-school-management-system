<template>
    <div class="p-1">
        <modal :show.sync="isCreating">
            <span slot="title">Create Page Like Notes</span>
            <CreateNotesPage @onSubmit="addPage">
            </CreateNotesPage>
        </modal>
        <PageIconsComponent 
            :courseUnit="courseUnit"
            :dataPaginator="paginatedNotes"
            @itemsChanged="itemsChanged"
            @isCreating="isCreating=true"
        ></PageIconsComponent>
        <div class="flex-center" v-if="isFetching">
            <i class="fa fa-spin fa-spinner"></i>
            <span class="ml-3"> Fetching notes ....</span>
        </div>
        <div  v-else>
            <template v-for ="note,index in notes">
             <PageNotesComponent 
                @edit="editableIndex=index"
                :pageNotes="note"
                :courseUnitName="courseUnitName"
                >
             </PageNotesComponent>
            </template>
         
            <CourseUnitTextEditor 
                v-if="editableIndex!=null"
                :editableIndex.sync="editableIndex"
                :courseUnitName="courseUnitName"
                :notes="notes"
                @updatePageNotes="updateLocalCopy"
                >
            </CourseUnitTextEditor>
          
        </div>
    </div>  
</template>

<script>
let cachedNotes={};
import CreateNotesPage from "./CreateNotesPage";
import PageNotesComponent from "./PageNotesComponent";
import CourseUnitTextEditor from "./CourseUnitTextEditor";

import PageIconsComponent from "./PageIconsComponent";

export default {
    components:{
        CreateNotesPage,
        PageNotesComponent,
        CourseUnitTextEditor,
        PageIconsComponent
    },

    props: ["courseUnit"],
    mounted(){
    this.fetchAndCacheNotes();
    },
    data() {
        return {
            isFetching:false,
            isCreating:false,
            editableIndex:null,
            error: "",
            paginatedNotes:{},
            notes:{}
        };
    },
    computed: {
        url() {
            return `/courseUnit/${this.id}/notes`;
        },
        id(){
            return this.courseUnit.id;
        },
        courseUnitName(){
            return this.courseUnit.name;
        }
    },
    methods: {
        itemsChanged(notes){
            this.notes=notes;
            window.scrollTo(0,0);
        },
        notesIsCached(){
            return  hasOwnProp(cachedNotes,this.id)
        },
        fetchAndCacheNotes(){
            this.isFetching=true;
            axios.get(this.url).then(({data})=>{
                this.cacheNotes(data)
                this.isFetching=false;
            })
        },
        cacheNotes(notes){
            this.paginatedNotes=notes;
            //caching here
            //but we cant cache empty notes
            if (hasOwnProp(notes,"data") && notes.data.length>0) {
                 cachedNotes[this.id]=notes
            }
          
        },
        addPage(data){
            this.isCreating=false;
            axios.post(this.url,data).then(({data})=>{
                this.cacheNotes(data)
            })
            .catch(errors=>{
                flash.errors(errors.response.data.errors)
            })
        },
        updateLocalCopy({index, contents}){
      
            this.$set(this.paginatedNotes.data[index],"contents",contents)
          //cache the data
           cachedNotes[this.id]["data"][index].contents=contents;
           
        }
    },
    watch:{
        courseUnit(){
            if (!this.notesIsCached()) {
                return this.fetchAndCacheNotes();
                
            }
            //at this point we have the notes and we need to fetch them from the cache
            this.paginatedNotes=cachedNotes[this.id]
        }
    }
};
</script>
