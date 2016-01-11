$( document ).ready(function() {
	$('.team-vote').click(function(){
		var vote = $(this).attr("team");
		var opp = $(this).attr("opp");
		var mid = $(this).attr("mid");
			$.ajax({
		       	url: "process_vote.php", 
		       	type: "post",
		       	data: {vote:vote, opp:opp, mid:mid},
		       	success: function(result){
					obj = JSON.parse(result);
					var new_vote = Number(obj.vote);
					var new_opp = Number(obj.opp);

					$( "[team-wrapper="+vote+"]" ).html(new_vote+'% of the vote');
					$( "[team-wrapper="+opp+"]" ).html(new_opp+'% of the vote');

		       	}
	  	    });			
	});

});