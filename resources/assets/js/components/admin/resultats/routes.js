export default [
  {
    name:       'admin_resultats_index',
    path:       '/admin_resultats_index',
    component:  require('./index.vue')
  }, {
    name:       'admin_resultats_new',
    path:       '/admin_resultats_new',
    component:  require('./new.vue')
  }, {
    name:       'admin_resultats_edit',
    path:       '/admin_resultats_edit/:id',
    component:  require('./edit.vue')
  }
];
