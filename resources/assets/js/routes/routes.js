import routeAlbums      from './../components/admin/albums/routes.js';
import routeArticles    from './../components/admin/articles/routes.js';
import routeCategories  from './../components/admin/categories/routes.js';
import routeCourses     from './../components/admin/courses/routes.js';
import routeJudoEvents  from './../components/admin/judo_events/routes.js';
import routeSeasons     from './../components/admin/seasons/routes.js';
import routeUsers       from './../components/admin/users/routes.js';
import routeResultats   from './../components/admin/resultats/routes.js';
import routeAgeCategories from './../components/admin/age_categories/routes.js';
import routeInscription from './../components/all/inscriptions/routes.js';
import routeVisitor     from './../components/all/articles/routes.js';
import routeVisitorCourse from './../components/all/courses/routes.js';
import routeVisitorEvents from './../components/all/judo_events/routes.js';
import routeVisitorContact from './../components/all/contact/routes.js';

const routes = [
  {
    name:       'home',
    path:       '/',
    component:  require('./../components/all/articles/v-home.vue')
  }, {
    name:       'dashboard',
    path:       '/dashboard',
    component:  require('./../components/v-dashboard.vue')
  }, {
    name:       'register',
    path:       '/register',
    component:  require('./../components/v-register.vue')
  }, {
    name:       'signin',
    path:       '/signin',
    component:  require('./../components/v-signin.vue')
  }, {
    name:       'admin_dashboard',
    path:       '/admin',
    component:  require('./../components/admin/v-admin.vue')
  }
];

Array.prototype.push.apply(routes, routeAlbums);
Array.prototype.push.apply(routes, routeArticles);
Array.prototype.push.apply(routes, routeCategories);
Array.prototype.push.apply(routes, routeCourses);
Array.prototype.push.apply(routes, routeJudoEvents);
Array.prototype.push.apply(routes, routeSeasons);
Array.prototype.push.apply(routes, routeUsers);
Array.prototype.push.apply(routes, routeResultats);
Array.prototype.push.apply(routes, routeAgeCategories);
Array.prototype.push.apply(routes, routeInscription);
Array.prototype.push.apply(routes, routeVisitor);
Array.prototype.push.apply(routes, routeVisitorCourse);
Array.prototype.push.apply(routes, routeVisitorEvents);
Array.prototype.push.apply(routes, routeVisitorContact);

export default routes;
