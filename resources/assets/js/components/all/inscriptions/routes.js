export default [
  {
    name:       'inscriptions_index',
    path:       '/inscriptions_index',
    component:  require('./index.vue')
  }, {
    name:       'inscriptions_edit',
    path:       '/inscriptions/:id?',
    component:  require('./edit.vue')
  }
];
