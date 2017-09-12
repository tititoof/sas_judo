<template>
    <div>
        <h1>
            <small>
                <ui-icon-button
                    icon="arrow_left" size="small" color="green"
                    @click.prevent="back()">
                </ui-icon-button>
            </small>
            Editer catégorie d'âge
            <small>
                <ui-button
                    class="pull-right"
                    type="primary" color="primary" size="large"
                    @click.prevent="update()"
                    >
                    Modifier
                </ui-button>
            </small>
        </h1>
        <ui-textbox
            label="Nom"
            name="name"
            type="text" placeholder="Entrer le nom de la catégorie"
            v-model="name"
            >
        </ui-textbox>
        <ui-textbox
            label="Âge" name="years" type="text"
            placeholder="Entrer le nombre d'année"
            v-model="years"
            >
        </ui-textbox>
    </div>
</template>
<script>
import Keen         from 'keen-ui'
import Vue          from './../../../app.js'
import { router }   from './../../../app.js'
import common       from './common.js'
import back         from './../back.js'
export default {
    data() {
        return {
            id:     '',
        }
    },
    mixins: [common, back],
    methods: {
        index() {
            const _self = this;
            _self.$http.get('api/age_category/' + _self.id + '/edit')
            .then(
                response => {
                    _self.name  = response.data.ageCategory.name;
                    _self.years = response.data.ageCategory.years;
                }
            ).catch(
                error   => {
                    _self.$store.dispatch("showError", {
                        response:       error.response,
                        formElements:   _self.formErrors,
                        vue:            _self
                    })
                }
            )
        },
    update() {
        const _self = this;
        _self.$http.patch(
            'api/age_category/' + _self.id,
            { name: _self.name, years: _self.years }
        ).then(
            () => {
                _self.$emit('sas-snackbar', 'Catégorie d\'âge modifiée');
                router.push({ name: 'admin_age_categories_index' });
            }
        ).catch(
            error   => {
                _self.$store.dispatch("showError", {
                    response:       error.response,
                    formElements:   _self.formErrors,
                    vue:            _self
                })
            }
        )
    }
  },
  mounted() {
    const _self = this;
    this.$nextTick(function () {
        _self.$store.dispatch("check",
            { app: _self, router: router }
        )
        _self.id = _self.$route.params.id;
        _self.index();
    });
  }
}
</script>
