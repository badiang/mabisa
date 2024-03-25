

function upload_1() {
	$("#file_report_1").trigger("click");
}
function upload_2() {
	$("#file_report_2").trigger("click");
}
function upload_3() {
	$("#file_report_3").trigger("click");
}
function upload_4() {
	$("#file_report_4").trigger("click");
}
function upload_5() {
	$("#file_report_5").trigger("click");
}
function upload_6() {
	$("#file_report_6").trigger("click");
}
function upload_7() {
	$("#file_report_7").trigger("click");
}
function upload_8() {
	$("#file_report_8").trigger("click");
}
function upload_9() {
	$("#file_report_9").trigger("click");
}
function upload_10() {
	$("#file_report_10").trigger("click");
}
function upload_11() {
	$("#file_report_11").trigger("click");
}
function upload_12() {
	$("#file_report_12").trigger("click");
}
function upload_13() {
    $("#file_report_13").trigger("click");
}
function upload_14() {
    $("#file_report_14").trigger("click");
}
function upload_15() {
    $("#file_report_15").trigger("click");
}
function upload_16() {
    $("#file_report_16").trigger("click");
}
function upload_17() {
    $("#file_report_17").trigger("click");
}
function upload_18() {
    $("#file_report_18").trigger("click");
}
function upload_19() {
    $("#file_report_19").trigger("click");
}
function upload_20() {
    $("#file_report_20").trigger("click");
}
function upload_21() {
    $("#file_report_21").trigger("click");
}

function uploadFile() {
    const fileInput = $('#file_report_1')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            // You can do something with the server response here if needed.
            $('#file_name1').html('<a href=../actions/upload/uploaded/'+fileName+' target="_blank">'+fileName+'</a><i class="fas fa-trash"></i>');
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile2() {
    const fileInput = $('#file_report_2')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file2.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile3() {
    const fileInput = $('#file_report_3')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file3.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile4() {
    const fileInput = $('#file_report_4')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file4.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile5() {
    const fileInput = $('#file_report_5')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file5.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile6() {
    const fileInput = $('#file_report_6')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file6.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile7() {
    const fileInput = $('#file_report_7')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file7.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile8() {
    const fileInput = $('#file_report_8')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file8.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile9() {
    const fileInput = $('#file_report_9')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file9.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile10() {
    const fileInput = $('#file_report_10')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file10.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile11() {
    const fileInput = $('#file_report_11')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file11.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile12() {
    const fileInput = $('#file_report_12')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file12.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile13() {
    const fileInput = $('#file_report_13')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file13.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile14() {
    const fileInput = $('#file_report_14')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file14.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile15() {
    const fileInput = $('#file_report_15')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file15.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile16() {
    const fileInput = $('#file_report_16')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file16.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile17() {
    const fileInput = $('#file_report_17')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file17.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile18() {
    const fileInput = $('#file_report_18')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file18.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile19() {
    const fileInput = $('#file_report_19')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file19.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile20() {
    const fileInput = $('#file_report_20')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file20.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}
function uploadFile21() {
    const fileInput = $('#file_report_21')[0];
    const file = fileInput.files[0];
    const filePath = fileInput.value;
    const fileName = filePath.split('\\').pop();
    if (!file) {
        alert('Please select a file to upload.');
        return;
    }
    const formData = new FormData();
    formData.append('file', file);

    const progressDiv = $('#progress');
    progressDiv.text('Uploading...');

    $.ajax({
        url: '../actions/upload/upload_file21.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            progressDiv.text('Upload complete!');
            alert(data);
            window.location.reload();
            console.log(data);
        },
        error: function(error) {
            progressDiv.text('Upload failed.');
            console.error('Error:', error);
        }
    });
}

function delete_file1(val,area,under,numb) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload/delete_file1.php",
        async: false,
        data: {
            val: val,
            area: area,
            under: under,
            numb: numb,
            delete: 1
        },
        success:function(result){
            alert(result);
            window.location.reload();
        }
    });
}
function delete_file2(val,area,under,numb) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload/delete_file2.php",
        async: false,
        data: {
            val: val,
            area: area,
            under: under,
            numb: numb,
            delete: 1
        },
        success:function(result){
            alert(result);
            window.location.reload();
        }
    });
}
function delete_file3(val,area,under,numb) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload/delete_file3.php",
        async: false,
        data: {
            val: val,
            area: area,
            under: under,
            numb: numb,
            delete: 1
        },
        success:function(result){
            alert(result);
            window.location.reload();
        }
    });
}
function delete_file4(val,area,under,numb) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload/delete_file4.php",
        async: false,
        data: {
            val: val,
            area: area,
            under: under,
            numb: numb,
            delete: 1
        },
        success:function(result){
            alert(result);
            window.location.reload();
        }
    });
}
function delete_file5(val,area,under,numb) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload/delete_file5.php",
        async: false,
        data: {
            val: val,
            area: area,
            under: under,
            numb: numb,
            delete: 1
        },
        success:function(result){
            alert(result);
            window.location.reload();
        }
    });
}
function delete_file6(val,area,under,numb) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload/delete_file6.php",
        async: false,
        data: {
            val: val,
            area: area,
            under: under,
            numb: numb,
            delete: 1
        },
        success:function(result){
            alert(result);
            window.location.reload();
        }
    });
}
function delete_file7(val,area,under,numb) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload/delete_file7.php",
        async: false,
        data: {
            val: val,
            area: area,
            under: under,
            numb: numb,
            delete: 1
        },
        success:function(result){
            alert(result);
            window.location.reload();
        }
    });
}
function delete_file(val) {
	// alert(val);
	$.ajax({
	    type: "POST",
	    url: "../actions/upload/delete_file.php",
	    async: false,
	    data: {
	    	val: val,
	      	delete: 1
	    },
	    success:function(result){
	      	alert(result);
	      	window.location.reload();
	    }
	});
}