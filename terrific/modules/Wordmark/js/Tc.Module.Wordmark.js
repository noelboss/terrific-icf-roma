(function($) {
    /**
     * Wordmark module implementation.
     *
     * @author Namics
     * @namespace Tc.Module
     * @class Wordmark
     * @extends Tc.Module
     */
    Tc.Module.Wordmark = Tc.Module.extend({
		
		count: 0,
		
		init: function($ctx, sandbox, modId) {
	        this._super($ctx, sandbox, modId);
	    },
	
        onBinding: function() {
			
        },
		
		afterBinding: function() {
			$('a.fancybox').fancybox();
			var that = this;
			setTimeout(function() {
				that.onRefresh();
			}, 7000);
		},
		
		onRefresh: function() {
			var that = this;
			$.ajax({
				url: Terrific.ajaxurl,
				data: 'action=wordmark',
				dataType: 'json',
			    success: function(data){
					that.onAddImpulse(data);
			  	}
			});
		},
		
		/**
		 * Handles the add impulse event.
		 *
		 * @method onAddImpulse
         * @return boolean indicates whether the default action should be excuted or not
         */
        onAddImpulse: function(impulse) {
			var that = this;
			var o = [];
			for(var i = 0; i < impulse.length; i++) {
				o[o.length] = ' <span class="wort">' + impulse[i] + '. </span>';
			}
			
			var $impulse = $(o.join(' '));
			
			$('.wordmark', this.$ctx).empty();
			$('.wordmark', this.$ctx).append('<span class="letztes">Namics.</span>');
			$('.wordmark', this.$ctx).prepend($impulse);
			/*
			if (this.count == 0) {
				$('span', this.$ctx).show();
				this.count++;
				setTimeout(function() {
					that.onRefresh();
				}, 7000);
				return;
			}
			*/
			$('span', this.$ctx).hide();
			
            function showNextWord($elem) {
				$elem.next('span').fadeIn(800, function() {
                    showNextWord($(this));
					if ($(this).text() == 'Namics.') {
						setTimeout(function() {
							that.onRefresh();
						}, 7000);
					}
                });
            }
            
            $($('span', this.$ctx).get(0)).fadeIn(800, function() {
                showNextWord($(this));
            });
			this.count++;
        },
		
		/**
         * Handles the remove impulse event.
         *
         * @method onRemoveImpulse
         * @return boolean indicates whether the default action should be excuted or not
         */
        onRemoveImpulse: function() {
           $('span:not(:has(em))', this.$ctx).remove();
        }
    });
})(Tc.$);