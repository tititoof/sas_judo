export default [{
  name:       'admin_articles_index',
  path:       '/admin-articles-index',
  component:  require('./index.vue')
}, {
  name:       'admin_articles_new',
  path:       '/admin-articles-new',
  component:  require('./new.vue')
}, {
  name:       'admin_articles_edit',
  path:       '/admin-articles-edit/:articleId/:albumId?',
  component:  require('./edit.vue')
}];
