<template>
    <div>
        <div class="form-group" v-for="recipe in recipes">
            <label>{{ recipe.name }}</label>
            <div class="input-group">
                <input v-bind:value="recipe.title" v-bind:name="'recipes[' + recipe.id + ']'" type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="button" @click="deleteRecipe($index)"><span class="icon-garbage"></span></button>
                </span>
            </div>
        </div>
        <Multiselect
                :options="recipeList"
                :selected="selectedRecipes"
                :local-search="false"
                :loading="isLoading"
                id="ajax"
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
        name: 'RecipeSelector',
        props: [ 'api' ],
        data(){
            return{
                isLoading: false,
                recipes: [],
                recipeList: [],
                selectedRecipes: []
            }
        },
        methods: {
            asyncFind (query) {
                if (query.length === 0) {
                    this.recipeList = []
                } else {
                    this.isLoading = true;

                    this.$http.get('api/recipes/' + query).then((response) => {
                        this.$set('recipeList', response.body);
                        this.isLoading = false;
                    }, (response) => {
                        console.log('Error while fetching /api/recipes/' + query);
                        this.isLoading = false;
                    });
                }
            },
            asyncUpdate (newVal) {
                console.log(newVal);
                if(newVal != null){
                    this.selectedRecipes = newVal;
                    this.recipes.push(newVal);
                }
            },
            deleteRecipe(index){
                console.log('deleting' + index);
                this.recipes.splice(index, 1);
            }
        },
        ready(){
            //Load the current List of recipes from the Server using the URL given by the api prop
            if(this.api && this.api != ''){
                this.$http.get(this.api).then((response) => {
                    this.$set('recipes', response.body);
                }, (response) => {
                    console.log('Error while prefetching recipes via: ' + this.api);
                });
            }

            console.log('RecipeSelector.vue ready');
        }
    }
</script>
