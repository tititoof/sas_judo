export default [
  {
    name:       'admin_categories_index',
    path:       '/admin-categories-index',
    component:  require('./index.vue')
  }, {
    name:       'admin_categories_edit',
    path:       '/admin-categories-edit/:categoryId',
    component:  require('./edit.vue')
  }, {
    name:       'admin_categories_new',
    path:       '/admin-categories-new',
    component:  require('./new.vue')
  }
];
