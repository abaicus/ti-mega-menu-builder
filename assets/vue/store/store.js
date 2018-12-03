// jshint ignore: start
/* global tiMmb */
import Vue from 'vue'
import Vuex from 'vuex'
import actions from './actions'
import mutations from './mutations'

Vue.use( Vuex );

export default new Vuex.Store( {
	state: {
		navMenuPreview: null,
		data: tiMmb,
		menuMap: {}
	},
	actions,
	mutations
} )