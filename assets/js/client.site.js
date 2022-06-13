var client = client || {};

client.site = client.site || {};

client.site = (function ($) {

	var $body = $('body'),
		$window = $(window),
		$doc = $(document),
		self;

	return {

		/**
		 * Initialize our site
		 * Add our events
		 */
		init: function () {
			self = client.site;

			$body
				.on('click', '.clickable', self.clickable);

			/* Back to Top Button */
			$('body').on('click', '.back-to-top', function(e){
				e.preventDefault();
				$('html, body').animate({
					scrollTop: ( 0 )
				}, 750);
			});
		},

		/**
		 * Utility wrapper to block clicks.
		 *
		 * @param event
		 */
		clickable: function (event) {

			if (event.target['href'] == null) {
				event.preventDefault();
				event.stopPropagation();

				var $tgt = $(this),
					$a = $tgt.find('a:first'),
					$btn = $tgt.find('button:first'),
					uri = $a.attr('href'),
					new_window = $tgt.hasClass('external-link') || $a.hasClass('external-link') || event.metaKey || event.ctrlKey;

				if ($btn.length > 0) {
					event.stopImmediatePropagation();
					$btn.trigger('click');
					return;
				}

				if ($btn.length < 1 && $a.length > 0) {
					if (new_window) {
						window.open(uri);
					} else {
						window.location = uri;
					}
				}

				return false;
			} else {
				return;
			}
		},
	};

})(jQuery);

client.site.init();
