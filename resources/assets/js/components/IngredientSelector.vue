<template>
    <div>
        <div class="form-group" v-for="ingredient in ingredients">
            <label>{{ ingredient.name }}</label>
            <div class="input-group">
                <input v-bind:name="'ingredients[' + ingredient.id + ']'" type="text" class="form-control">
                <span class="input-group-addon">{{ ingredient.unit }}</span>
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="button" @click="deleteIngredient($index)"><span class="icon-garbage"></span></button>
                </span>
            </div>
        </div>
        <Multiselect
                :options="ingredientsList"
                :selected="selectedIngredients"
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
        name: 'IngredientSelector',
        data(){
            return{
                isLoading: false,
                ingredients: [],
                ingredientsList: [],
                selectedIngredients: []
            }
        },
        computed: {
          listIngred(){
              return JSON.stringify(this.ingredientsList);
          },
          listSelec(){
              return JSON.stringify(this.selectedIngredients);
          }
        },
        methods: {
            asyncFind (query) {
                if (query.length === 0) {
                    this.ingredientsList = []
                } else {
                    this.isLoading = true;

                    this.$http.get('/api/ingredients/' + query).then((response) => {
                        this.$set('ingredientsList', response.body);
                        this.isLoading = false;
                    }, (response) => {
                        console.log('Error while fetching /api/ingredients/' + query);
                        this.isLoading = false;
                    });
                }
            },
            asyncUpdate (newVal) {
                console.log(newVal);
                if(newVal != null){
                    this.selectedIngredients = newVal;
                    this.ingredients.push(newVal);
                }
            },
            deleteIngredient(index){
                console.log('deleting' + index);
                this.ingredients.splice(index, 1);
            }
        },
        ready(){
            console.log('IngredientSelector.vue ready');
        }
    }
</script>

<style>

</style>
