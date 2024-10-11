( function( api ) {

	// Extends our custom "unique-freelancer-portfolio" section.
	api.sectionConstructor['unique-freelancer-portfolio'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );