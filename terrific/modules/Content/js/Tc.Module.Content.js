(function($) {
	/**
	 * Content JS
	 *
	 * @namespace Tc.Module
	 * @class CommentForm
	 * @extends Tc.Module
	 */
	Tc.Module.Content = Tc.Module.extend({
		init: function($ctx, sandbox, modId) {
			this._super($ctx, sandbox, modId);
		},
	
		 onBinding: function() {
			var iPhone = false;
            if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) {
                iPhone = true;
            }

            if (iPhone) {
                $('body').addClass('iphone');
            } else {  
				var $one = $('.format-image',this.$ctx).eq(0); 
				if($one.length > 0){
					var $img = $('.format-image .entry-content em',this.$ctx),
						width,
		            	size;
					var textSize = function() {
			            var width = $one.width();
			            var size = parseInt(width, 10) / 1000;

						console.log('width: '+width+' size:'+size);

			            if(!iPhone) {
			                $img.css('fontSize', size + 'em');
			            }  
			        } 
			        textSize();

			        $(window).resize(function() {
			            textSize();
			        });
				}
			}         
		} 
		
	});
})(Tc.$);