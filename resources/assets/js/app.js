
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import Router from './routes.js';

const app = new Vue({
    router: Router,
    template: `
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-light mb-3">
                <a class="navbar-brand" href="#">CustomerApp</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <router-link to="/" class="nav-link">Customer</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/about" class="nav-link">About</router-link>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#"></a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right ">
                        <li class="nav-item active">
                            <router-link to="/add" class="nav-link">Add Customer</router-link>
                        </li>
                        
                    </ul>
                </div>
            </nav>
            <router-view></router-view>
        </div>
    
    `
}).$mount("#app")
