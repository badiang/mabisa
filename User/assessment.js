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

function assessmentView() {
	$.ajax({
	    type: "POST",
	    url: "../actions/dashboard/assessment-user/view.php",
	    async: false,
	    data: {
	      	view: 1
	    },
	    success:function(result){
	      	$('#assessmenTable').html(result);
	    }
	});
}

function delete_assessment(val) {
	$.ajax({
	    type: "POST",
	    url: "../actions/dashboard/assessment-user/delete.php",
	    async: false,
	    data: {
	    	val: val,
	      	delete: 1
	    },
	    success:function(result){
	      	// $('#assessmenTable').html(result);
	      	assessmentView();
	    }
	});
}

function saveAssessment() {
	$region = $('#region_a').val();
	$province_a = $('#province_a').val();
	$city_a = $('#city_a').val();
	$barangay_a = $('#barangay_a').val();
	$year_a = $('#year_a').val();
	if ($year_a == '') {
		$('#alert_a').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
		  '<strong>Error!</strong> Barangay cannot be empty.'+
		  '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
		    '<span aria-hidden="true">&times;</span>'+
		  '</button>'+
		'</div>');
		$ok = 0;
	}
	if ($barangay_a == '' || $barangay_a == null) {
		$('#alert_a').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
		  '<strong>Error!</strong> Barangay cannot be empty.'+
		  '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
		    '<span aria-hidden="true">&times;</span>'+
		  '</button>'+
		'</div>');
		$ok = 0;
	}
	if ($city_a == '' || $city_a == null) {
		$('#alert_a').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
		  '<strong>Error!</strong> Barangay cannot be empty.'+
		  '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
		    '<span aria-hidden="true">&times;</span>'+
		  '</button>'+
		'</div>');
		$ok = 0;
	}
	if ($province_a == '' || $province_a == null) {
		$('#alert_a').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
		  '<strong>Error!</strong> Barangay cannot be empty.'+
		  '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
		    '<span aria-hidden="true">&times;</span>'+
		  '</button>'+
		'</div>');
		$ok = 0;
	}
	if ($region == '' || $region == null) {
		$('#alert_a').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
		  '<strong>Error!</strong> Barangay cannot be empty.'+
		  '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
		    '<span aria-hidden="true">&times;</span>'+
		  '</button>'+
		'</div>');
		$ok = 0;
	}
	$.ajax({
	    type: "POST",
	    url: "../actions/dashboard/assessment-user/add.php",
	    async: false,
	    data: {
	    	region: $region,
	    	province: $province_a,
	    	city: $city_a,
	    	barangay: $barangay_a,
	    	year: $year_a,
	      	add: 1
	    },
	    success:function(result){
	    	// alert(result);
	    	if (result == 1) {
				$('#alert_a').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
				  '<strong>Success!</strong> Assessment Successfully Saved.'+
				  '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
				    '<span aria-hidden="true">&times;</span>'+
				  '</button>'+
				'</div>');
				$('#region_a').val('');
				$('#province_a').val('');
				$('#city_a').val('');
				$('#barangay_a').val('');
				$('#year_a').val('');
				assessmentView();
	    	}else if (result == 2){
				$('#alert_a').html('<div class="alert alert-warning alert-dismissible fade show" role="alert">'+
				  '<strong>Warning!</strong> Creating Assessment to another Barangay is prohibited. Thank You.'+
				  '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
				    '<span aria-hidden="true">&times;</span>'+
				  '</button>'+
				'</div>');
	    	}else{
				$('#alert_a').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
				  '<strong>Error!</strong> Duplicate Assessment cannot be Save.'+
				  '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
				    '<span aria-hidden="true">&times;</span>'+
				  '</button>'+
				'</div>');
	    	}
	    }
	});
}

function refresh01() {
	$.ajax({
	    type: "POST",
	    url: "../actions/dashboard/all_barangay/view.php",
	    async: false,
	    data: {
	      	view: 1
	    },
	    success:function(result){
	      	$('#list_of_barangay_assessment').html(result);
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
		      	$('#list_of_barangay_assessment').html(result);
		    }
		});
	}
}