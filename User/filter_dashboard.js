function filter_d(){
	val = $('#assessment_year').val();
	$.ajax({
	    type: "POST",
	    url: "actions/auto_user_dash.php",
	    async: false,
	    data: {
	    	val: val,
	      	ref: 1
	    },
	    success:function(result){
	      	$('#user_dash').html(result);
	    }
	});
}

setInterval(filter_d, 3000);