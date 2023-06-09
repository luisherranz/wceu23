import { store } from '@wordpress/interactivity';

store( {
	selectors: {
		wceu2023: {
			isOpen: ( { state, context } ) =>
				state.wceu2023.selected === context.wceu2023.id,
			toggleText: ( store ) => {
				const { selectors, state } = store;
				return selectors.wceu2023.isOpen( store )
					? state.wceu2023.closeText
					: state.wceu2023.openText;
			},
		},
	},
	actions: {
		wceu2023: {
			toggle: ( { state, context } ) => {
				if ( state.wceu2023.selected === context.wceu2023.id ) {
					state.wceu2023.selected = null;
				} else {
					state.wceu2023.selected = context.wceu2023.id;
				}
			},
		},
	},
} );
