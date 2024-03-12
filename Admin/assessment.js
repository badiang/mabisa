function view_ass() {
	$.ajax({
	    type: "POST",
	    url: "../actions/dashboard/assessment-admin/view.php",
	    async: false,
	    data: {
	      	view: 1
	    },
	    success:function(result){
	      	$('#viewAssessment').html(result);
	    }
	});
}

function view_filter() {
	ok = 1;
	region = $('#region').val();
	province = $('#province').val();
	city = $('#city').val();
	barangay = $('#barangay').val();
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
	if (barangay == '' || barangay == null) {
		$('#alert_barangay').html('<small style="color: red">empty</small>');
		ok=0;
	}else{
		$('#alert_barangay').html('<small class="btn btn-sm btn-success btn-circle">'+
            '<i class="fas fa-check"></i>'+
        '</small>');
		ok=1;
	}
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
		    url: "actions/view_filter_barangay.php",
		    async: false,
		    data: {
		    	region: region,
		    	province: province,
		    	city: city,
		    	barangay: barangay,
		    	assessment_year: assessment_year,
		      	view: 1
		    },
		    success:function(result){
		      	$('#dataTable').html(result);
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