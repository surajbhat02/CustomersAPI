import Vue from 'vue';
import VueRouter from 'vue-router';
import Customers from './components/Customers'
import About from './components/About'
import Add from './components/Add'
import CustomerDetails from './components/CustomerDetails'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    base: __dirname,
    routes: [
        {path: '/', component: Customers},
        {path: '/about', component: About},
        {path: '/add', component: Add},
        {path: '/customer/:id', component: CustomerDetails}


    ]
})

export default router

