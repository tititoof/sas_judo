export default [
  {
    name:       'admin_users_index',
    path:       '/admin_users_index',
    component:  require('./index.vue')
  }, {
    name:       'admin_users_edit',
    path:       '/admin_users_edit/:userId',
    component:  require('./edit.vue')
  }
];
