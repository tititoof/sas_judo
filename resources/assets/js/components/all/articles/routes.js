export default [
    {
        name:       'visitor_news',
        path:       '/news/:menu',
        component:  require('./news.vue')
    },
    {
        name:       'visitor_results',
        path:       '/results/:menu',
        component:  require('./results.vue')
    }
];
