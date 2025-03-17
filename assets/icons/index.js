const requireAll = ( requireContext ) =>
	requireContext.keys().map( requireContext );

try {
	requireAll( require.context( './', true, /\.svg$/ ) );
} catch ( error ) {
	console.log( error );
}
