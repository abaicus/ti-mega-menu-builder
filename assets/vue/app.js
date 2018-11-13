/* jshint esversion: es6 */
import Vue from 'vue';
import store from './store/store.js';
import App from './App.vue';

new Vue( {
	el: '#ti-mmb',
	store,
	render: h => h( App )
} );
