<template>
    <div>
        <input v-bind:value="category.id" v-bind:name="'category[' + category.id + ']'" type="hidden" v-for="category in categories">

        <label>Categories</label>
        <Multiselect
                :options="categoriesList"
                :selected="selectedCategories"
                :multiple="true"
                :local-search="false"
                :loading="isLoading"
                id="categories"
                @search-change="asyncFind"
                @update="asyncUpdate"
                label="name"
                key="id"
                placeholder="Type to search">
        </Multiselect>
    </div>
</template>

<script>
    export default{
        name: 'CategorySelector',
        props: [ 'api' ],
        data(){
            return{
                isLoading: false,
                categories: [],
                categoriesList: [],
                selectedCategories: []
            }
        },
        methods: {
            asyncFind (query) {
                if (query.length === 0) {
                    this.categoriesList = []
                } else {
                    this.isLoading = true;

                    this.$http.get('api/categories/' + query).then((response) => {
                        this.$set('categoriesList', response.body);
                        this.isLoading = false;
                    }, (response) => {
                        console.log('Error while fetching /api/categories/' + query);
                        this.isLoading = false;
                    });
                }
            },
            asyncUpdate (newVal) {
                console.log(newVal);
                if(newVal != null){
                    this.selectedCategories = newVal;
                    this.$set('categories', newVal);
                }
            }
        },
        ready(){
            //Load the current List of Ingredients from the Server using the URL given by the api prop
            if(this.api && this.api != ''){
                this.$http.get(this.api).then((response) => {
                    this.$set('categories', response.body);
                    this.$set('selectedCategories', response.body);
                    console.log('categories are setted');
                }, (response) => {
                    console.log('Error while prefetching categories via: ' + this.api);
                });
            }else{
                console.log('No URL!');
            }

            console.log('CategorySelector.vue ready');
        }
    }
</script>

<style>
    .multiselect .multiselect__tags{
        border-color: rgba(0, 0, 0, 0.15);
        border-radius: .25rem;
    }
</style>
