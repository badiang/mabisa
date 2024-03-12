function view_filter2() {
	ok = 1;
	region = $('#region').val();
	province = $('#province').val();
	city = $('#city').val();
	// barangay = $('#barangay').val();
	assessment_year = $('#assessment_year').val();
	// alert(region);
	if (region == '' || region == null) {
		$('#alert_region').html('<small style="color: red">empty</small>');
		ok=0;
	}else{
		$('#alert_region').html('<small class="btn btn-sm btn-success btn-circle">'+
            '<i class="fas fa-check"></i>'+
        '</small>');
		ok=1;
	}
	if (province == '' || province == null) {
		$('#alert_province').html('<small style="color: red">empty</small>');
		ok=0;
	}else{
		$('#alert_province').html('<small class="btn btn-sm btn-success btn-circle">'+
            '<i class="fas fa-check"></i>'+
        '</small>');
		ok=1;
	}
	if (city == '' || city == null) {
		$('#alert_city').html('<small style="color: red">empty</small>');
		ok=0;
	}else{
		$('#alert_city').html('<small class="btn btn-sm btn-success btn-circle">'+
            '<i class="fas fa-check"></i>'+
        '</small>');
		ok=1;
	}
	// if (barangay == '' || barangay == null) {
	// 	$('#alert_barangay').html('<small style="color: red">empty</small>');
	// 	ok=0;
	// }else{
	// 	$('#alert_barangay').html('<small class="btn btn-sm btn-success btn-circle">'+
    //         '<i class="fas fa-check"></i>'+
    //     '</small>');
	// 	ok=1;
	// }
	if (assessment_year == '' || assessment_year == null) {
		$('#alert_assessment_year').html('<small style="color: red">empty</small>');
		ok=0;
	}else{
		$('#alert_assessment_year').html('<small class="btn btn-sm btn-success btn-circle">'+
            '<i class="fas fa-check"></i>'+
        '</small>');
		ok=1;
	}
	if (ok == 1) {
		$.ajax({
		    type: "POST",
		    url: "actions/filter_report.php",
		    async: false,
		    data: {
		    	region: region,
		    	province: province,
		    	city: city,
		    	// barangay: barangay,
		    	assessment_year: assessment_year,
		      	view: 1
		    },
		    success:function(result){
		      	$('#table_print').html(result);
		    }
		});
	}
}

function onchange_country(val) {
	$.ajax({
	    type: "POST",
	    url: "../actions/dashboard/user/onchange.php",
	    async: false,
	    data: {
	    	val: val,
	      	country: 1
	    },
	    success:function(result){
	      	$('#region').html(result);
	    }
	});
}

function onchange_region(val) {
	$.ajax({
	    type: "POST",
	    url: "../actions/dashboard/user/onchange.php",
	    async: false,
	    data: {
	    	val: val,
	      	region: 1
	    },
	    success:function(result){
	      	$('#province').html(result);
	      	$('#province_a').html(result);
	    }
	});
}

function onchange_province(val) {
	$.ajax({
	    type: "POST",
	    url: "../actions/dashboard/user/onchange.php",
	    async: false,
	    data: {
	    	val: val,
	      	province: 1
	    },
	    success:function(result){
	      	$('#city').html(result);
	      	$('#city_a').html(result);
	    }
	});
}

function onchange_city(val) {
	$.ajax({
	    type: "POST",
	    url: "../actions/dashboard/user/onchange.php",
	    async: false,
	    data: {
	    	val: val,
	      	city: 1
	    },
	    success:function(result){
	      	$('#barangay').html(result);
	      	$('#barangay_a').html(result);
	    }
	});
}


function print_table() {
    // Get values from input fields
    var region = $('#region').val();
    var province = $('#province').val();
    var city = $('#city').val();
    var assessment_year = $('#assessment_year').val();

    // Create a query string with the values
    var queryString = '?region=' + encodeURIComponent(region) +
                      '&province=' + encodeURIComponent(province) +
                      '&city=' + encodeURIComponent(city) +
                      '&assessment_year=' + encodeURIComponent(assessment_year);

    if (region != null && province != null && city != null && assessment_year != null) {
		window.open('print_table.php' + queryString, '_blank');
    }else{
		window.open('print_all.php', '_blank');
    }
}