export default [
  {
    name:       'admin_courses_index',
    path:       '/admin_courses_index',
    component:  require('./index.vue')
  }, {
    name:       'admin_courses_new',
    path:       '/admin_courses_new',
    component:  require('./new.vue')
  }, {
    name:       'admin_courses_edit',
    path:       '/admin_courses_edit/:id',
    component:  require('./edit.vue')
  }
];
