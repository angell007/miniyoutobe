import Vue from 'vue'
import Router from 'vue-router'


Vue.use(Router)

export default new Router({
//     routes: [{
//             path: '/',
//             name: 'home',
//             component: require('./views/home').default
//         },

//         {
//             path: '*',
//             component: require('./views/404').default
//         },

//         {
//             path: ':video',
//             name: 'video',
//             component: require('./views/detail').default,
//             props: true
//         }

//     ],

    linkActiveClass: "active",
    mode: "history"

})
