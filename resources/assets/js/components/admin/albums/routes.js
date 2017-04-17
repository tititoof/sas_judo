export default [
  {
    name:       'admin_albums_index',
    path:       '/admin-albums-index',
    component:  require('./index.vue')
  }, {
    name:       'admin_albums_new',
    path:       '/admin-albums-new/:articleId?',
    component:  require('./new.vue')
  }, {
    name:       'admin_albums_edit',
    path:       '/admin-albums-edit/:albumId',
    component:  require('./edit.vue')
  }
];
