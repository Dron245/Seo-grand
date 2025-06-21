$(document).ready(function() {

 	var lastStar = $('a.ratings_stars.ratings_vote:last').attr('data-rate');

	$('a.ratings_stars').hover(  
		

	    function() {  
	    	var rate = $(this).attr('data-rate');
	       // $(this).prevAll().andSelf().addClass('ratings_over');  
	        $('a.ratings_stars').each(function(index,val){
	        	if(rate < $(val).attr('data-rate')){
	        		$(val).removeClass('ratings_over');
	        		$(val).removeClass('ratings_vote');
	        	}else{
	        		$(val).addClass('ratings_over');
	        	}
	        	
	        });


	    },  
	     function() {

	     	$('a.ratings_stars').each(function(index,val){
	        	if($(val).attr('data-rate')  <= lastStar){
	        		//$(val).removeClass('ratings_over');
	        		$(val).addClass('ratings_vote');
	        	}else{
	        		$(val).removeClass('ratings_over');
	        	}
	        	
	        });

	        $(this).prevAll().andSelf().removeClass('ratings_over');  
	       // set_votes($(this).parent());  
	    }  
	);
});

$(function(){
	$('.starsRatingBlock a').click(function(){
		
		var type =  'starRating'+$(this).attr('data-rate');

		var id = $(this).attr('id').replace('rating','');
		jQuery.post('/ratingAjax', 
			{id: id, type: type},
			function (result) {
				console.log(result);
				$('.starsRatingBlock').replaceWith(result);
        	});
	});
});