export default [
  {
    name:       'admin_age_categories_index',
    path:       '/admin-age_categories-index',
    component:  require('./index.vue')
  }, {
    name:       'admin_age_categories_new',
    path:       '/admin-age_categories-new',
    component:  require('./new.vue')
  }, {
    name:       'admin_age_categories_edit',
    path:       '/admin-age_categories-edit/:id',
    component:  require('./edit.vue')
  }
];
