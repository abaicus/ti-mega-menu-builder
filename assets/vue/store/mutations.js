const updateNavMenuPreview = ( state, data ) => {
	state.navMenuPreview = data;
	setUpMenuMap( state, data );
};

const setUpMenuMap = ( state, data ) => {

	let map = {};
	if ( !Array.isArray( data ) ) {
		return state.menuMap = {};
	}
	data.forEach( function ( item, index ) {
		console.log( item );
		if ( item.menu_item_parent === '0' ) {
			console.log( 'root' );
			map[ item.menu_order ] = item;
		}
		if ( item.classes.indexOf( 'neve-mega-menu' ) ) {

		}
	} );

	console.log( map );


	state.menuMap = {};
};


export default {
	updateNavMenuPreview
}