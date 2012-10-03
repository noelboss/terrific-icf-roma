(function($) {
	
    /**
     * Example module implementation.
     *
     * @author Namics
     * @namespace Tc.Module
     * @class Example
     * @extends Tc.Module
     */
    Tc.Module.Example = Tc.Module.extend({
		
		init: function($ctx, sandbox, modId) {
	        this._super($ctx, sandbox, modId);
	    },
	
        onBinding: function() {
			
        },

		afterBinding: function() {
			
		}

    });
})(Tc.$);