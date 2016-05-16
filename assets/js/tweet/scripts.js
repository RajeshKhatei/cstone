jQuery(function($){
		
		var FEED = window.FEED || {};	
		
		//------ TWEETS ------//
			
		FEED.TWEET = function() {					
			$('.tweets_feed').twittie({
				template: 
				'<div class="tweet_text">'+
					'{{tweet}} <a href="{{url}}">{{date}}</a>'+
				'</div>'+
				'<div class="tweet_user">'+
					'<span class="username">{{screen_name}}</span>'+
				'</div>'
				,
			}, function(){
				$(".tweets_feed").owlCarousel({
		
					pagination : true,
					navigation : true,
					autoPlay: true,
					singleItem:true
				});
			});
		}
		

		
		  $(document).ready(function(){
				FEED.TWEET();
			});
	
	});
	 