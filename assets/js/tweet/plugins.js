// Avoid `console` errors in browsers that lack a console.
(function() {
	'use strict';
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

//-----------------------------------------
// Place any jQuery/helper plugins in here.
//-----------------------------------------

//-----------------------------------------
//---------------- WoW --------------------
//-----------------------------------------
var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true        // act on asynchronously loaded content (default is true)
  }
);
wow.init();

//-----------------------------------------
//------------ MixitUp --------------------
//-----------------------------------------
jQuery(document).ready(function($){
	'use strict';
	if($('#Grid').length){
		$('#Grid').mixItUp();
	}
	
	// jflickrfeed
	if($('#mate_flickr').length){
		$('#mate_flickr').jflickrfeed({
			limit: 6,
			qstrings: {
				id: '52617155@N08'
			},
			itemTemplate: '<li>'+
							'<a href="{{image}}" title="{{title}}">' +
								'<img src="{{image_s}}" alt="{{title}}" />' +
							'</a>' +
						  '</li>'
		});
	}
});	



//-----------------------------------------
//--------------- Video Script ------------
//-----------------------------------------
$(".player").mb_YTPlayer();	