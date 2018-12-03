/* jshint esversion: 6 */
/* global tiMmb, console */
import Vue from 'vue';
import VueResource from 'vue-resource';

Vue.use( VueResource );


const getMenu = function ( { commit }, data ) {
	Vue.http( {
		url: tiMmb.root + '/get_menu',
		method: 'POST',
		headers: { 'X-WP-Nonce': tiMmb.nonce },
		params: { 'req': data.req },
		body: data.data,
		responseType: 'json'
	} ).then( function ( response ) {
		if ( response.ok ) {
			commit( 'updateNavMenuPreview', response.body );
		}
	} );
};

const createMenu = function ( { commit }, data ) {
	Vue.http( {
		url: tiMmb.root + '/create_menu',
		method: 'POST',
		headers: { 'X-WP-Nonce': tiMmb.nonce },
		params: { 'req': data.req },
		body: data.data,
		responseType: 'json'
	} ).then( function ( response ) {
		if ( response.ok ) {
			tiMmb.navMenus.push( response.body );
			commit( 'updateNavMenuPreview', response.body );
		}
	} );
};


export default {
	getMenu,
	createMenu
}