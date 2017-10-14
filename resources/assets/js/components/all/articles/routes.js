export default [
    {
        name:       'visitor_news',
        path:       '/news/:menu/:page',
        component:  require('./news.vue')
    },
    {
        name:       'visitor_results',
        path:       '/results/:menu',
        component:  require('./results.vue')
    }
];
