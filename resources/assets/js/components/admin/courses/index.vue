<template>
  <div class="col-xs-12">
    <h1>
      Liste des cours
      <small>
        <ui-icon-button
          type="secondary" icon="add" color="accent" size="large"
          @click.prevent="create()"
        >
        </ui-icon-button>
      </small>
    </h1>
    <table
      class="table table-striped"
      v-if="courses.length > 0">
      <thead>
        <tr>
            <th>#</th>
            <th>Saison</th>
            <th>Jour</th>
            <th>Heures</th>
            <th>Professeur</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="course in courses">
          <td>
            <ui-icon-button
                type="secondary" icon="edit" color="orange" size="large"
                @click.prevent="edit(course.id)">
            </ui-icon-button>
            <ui-icon-button
                type="secondary" size="large" icon="delete" color="red"
                @click.prevent="destroy(course.id)">
            </ui-icon-button>
          </td>
          <td>{{ course.season }}</td>
          <td>{{ course.day }}</td>
          <td>{{ course.start_at }} - {{ course.end_at }}</td>
          <td>{{ course.teacher }}</td>
        </tr>
      </tbody>
    </table>
    <ui-confirm
        title="Suppression" type="primary"
        confirm-button-icon="delete"
        confirm-button-text="Supprimer"
        deny-button-text="Annuler"
        ref="deleteConfirm"
        @confirm="deleteConfirmed"
        @deny="deleteDenied"
        close-on-confirm
        >
        &ecirc;tes-vous s&ucirc;r de vouloir supprimer le cours ?
    </ui-confirm>
  </div>
</template>
<script>
  import auth from '../../../auth';
  import vMenu from '../../v-menu.vue';
  import Keen from 'keen-ui';
  import {app} from './../../../app.js';
  import {router} from './../../../app.js';
  export default {
    data() {
      return {
        courses:  [],
        deleteId: '',
      }
    },
    methods: {
      index() {
        const _self = this;
        _self.$http.get('api/course').then(
          (response) => {
              let data = response.data;
              _self.courses = data.objects;
          },
          (response) => {
              console.log(response);
          }
        )
      },
      create() {
        router.push({ name: 'admin_courses_new' });
      },
      deleteConfirmed() {

      },
      deleteDenied() {

      },
      edit(id) {
          const _self = this;
          router.push({ name: 'admin_courses_edit', params: { id: id } });
      },
      destroy(id) {
          const _self = this;
          _self.deleteId = id;
          _self.$refs['deleteConfirm'].open();
      },
    },
    components: {
        vMenu
    },
    mounted() {
      this.$nextTick(function() {
        const _self = this;
        auth.check(_self);
        _self.index();
      });
    }
  }
</script>
