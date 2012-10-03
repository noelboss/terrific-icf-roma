(function($) {
    /**
     * Comment form validation module implementation.
     *
     * @namespace Tc.Module
     * @class CommentForm
     * @extends Tc.Module
     */
    Tc.Module.CommentForm = Tc.Module.extend({
		init: function($ctx, sandbox, modId) {
	        this._super($ctx, sandbox, modId);
	    },
	
	     onBinding: function() {

			$("#commentform").validate({
				rules: {
					author: "required",
					email: {
						required: true,
						email: true
					},
					//url: "url",
					comment: "required"
				},
				messages: {
                    author: {
                        required: "Campo obbligatorio."
                    },
                    email: {
                        required: "Campo obbligatorio.",
                        email: "Il campo richiede un indirizzo email."
                    },
	                comment: {
	                    required: "Campo obbligatorio."
	                }
                }
			});

        }
    });
})(Tc.$);