export default [
  {
    name:       'admin_judo_event_index',
    path:       '/admin-judo-event-index',
    component:  require('./index.vue')
  }, {
    name:       'admin_judo_event_new',
    path:       '/admin-judo-event-new/:startAt?',
    component:  require('./new.vue')
  }, {
    name:       'admin_judo_event_edit',
    path:       '/admin-judo-event-edit/:id',
    component:  require('./edit.vue')
  }
];
