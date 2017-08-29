<template>
    <div class="col-xs-12">
        <div class="col-xs-4">
            <ui-select
                name="season" label="Catégorie d'âge"
                :options="ageCategories"
                v-model="ageCategorySelected"
                placeholder="Choisir la catégorie" show-search z-index="1"
                >
            </ui-select>
        </div>
        <div class="col-xs-4">
            <ui-textbox
                label="Nom" name="name" type="text" placeholder="Entrer le nom"
                v-model="name"
                >
            </ui-textbox>
        </div>
        <div class="col-xs-4">
            <ui-textbox
                label="Place" name="place" type="text" placeholder="Place"
                v-model="place"
                >
            </ui-textbox>
        </div>
    </div>
</template>
<script>
import Keen from 'keen-ui';
import {app} from './../../../app.js';
import {router} from './../../../app.js';
export default {
    data() {
        return {
            name:                 '',
            place:                '',
            ageCategories:        [],
            ageCategorySelected:  ''
        }
    },
    methods: {
        index() {
            const _self = this;
            _self.$http.get('api/age_category').then(
                response => {
                    const data = response.data.ageCategories;
                    data.forEach(
                        element => {
                            _self.ageCategories.push({ label: element.name,value: element.id });
                        }
                    );
                }
            ).catch(
                error   => {
                    _self.$emit('sas-errors', _self.$store.getters.showError(error.response, _self.formErrors));
                }
            );
        },
        getName() {
            return this.name;
        },
        getPlace() {
            return this.place;
        },
        getAgeCategory() {
            return this.ageCategorySelected;
        },
        setName(name) {
            this.name = name;
        },
        setPlace(place) {
            this.place = place;
        },
        setAgeCategory(ageCategory) {
            this.ageCategorySelected = ageCategory;
        }
    },
    mounted() {
        this.$nextTick(function() {
            const _self = this;
            _self.index();
        });
    }
}
</script>
<style>
</style>
