
function upload_311() {
    $("#file_report_311").trigger("click");
}
function upload_312() {
    $("#file_report_312").trigger("click");
}
function upload_313() {
    $("#file_report_313").trigger("click");
}
function upload_314() {
    $("#file_report_314").trigger("click");
}
function upload_315() {
    $("#file_report_315").trigger("click");
}
function upload_316() {
    $("#file_report_316").trigger("click");
}
function upload_317() {
    $("#file_report_317").trigger("click");
}
function upload_318() {
    $("#file_report_318").trigger("click");
}
function upload_319() {
    $("#file_report_319").trigger("click");
}
function upload_320() {
    $("#file_report_320").trigger("click");
}
function upload_321() {
    $("#file_report_321").trigger("click");
}
function upload_322() {
    $("#file_report_322").trigger("click");
}
function upload_323() {
    $("#file_report_323").trigger("click");
}
function upload_324() {
    $("#file_report_324").trigger("click");
}
function upload_325() {
    $("#file_report_325").trigger("click");
}
function upload_326() {
    $("#file_report_326").trigger("click");
}
function upload_327() {
    $("#file_report_327").trigger("click");
}
function upload_328() {
    $("#file_report_328").trigger("click");
}
function upload_329() {
    $("#file_report_329").trigger("click");
}

function uploadFile311() {
    const fileInput = $('#file_report_311')[0];
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
        url: '../actions/upload3/upload_file311.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile312() {
    const fileInput = $('#file_report_312')[0];
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
        url: '../actions/upload3/upload_file312.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile313() {
    const fileInput = $('#file_report_313')[0];
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
        url: '../actions/upload3/upload_file313.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile314() {
    const fileInput = $('#file_report_314')[0];
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
        url: '../actions/upload3/upload_file314.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile315() {
    const fileInput = $('#file_report_315')[0];
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
        url: '../actions/upload3/upload_file315.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile316() {
    const fileInput = $('#file_report_316')[0];
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
        url: '../actions/upload3/upload_file316.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile317() {
    const fileInput = $('#file_report_317')[0];
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
        url: '../actions/upload3/upload_file317.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile318() {
    const fileInput = $('#file_report_318')[0];
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
        url: '../actions/upload3/upload_file318.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile319() {
    const fileInput = $('#file_report_319')[0];
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
        url: '../actions/upload3/upload_file319.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile320() {
    const fileInput = $('#file_report_320')[0];
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
        url: '../actions/upload3/upload_file320.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile321() {
    const fileInput = $('#file_report_321')[0];
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
        url: '../actions/upload3/upload_file321.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile322() {
    const fileInput = $('#file_report_322')[0];
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
        url: '../actions/upload3/upload_file322.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile323() {
    const fileInput = $('#file_report_323')[0];
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
        url: '../actions/upload3/upload_file323.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile324() {
    const fileInput = $('#file_report_324')[0];
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
        url: '../actions/upload3/upload_file324.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile325() {
    const fileInput = $('#file_report_325')[0];
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
        url: '../actions/upload3/upload_file325.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile326() {
    const fileInput = $('#file_report_326')[0];
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
        url: '../actions/upload3/upload_file326.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile327() {
    const fileInput = $('#file_report_327')[0];
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
        url: '../actions/upload3/upload_file327.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile328() {
    const fileInput = $('#file_report_328')[0];
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
        url: '../actions/upload3/upload_file328.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile329() {
    const fileInput = $('#file_report_329')[0];
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
        url: '../actions/upload3/upload_file329.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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

function delete_file(val,area,under,numb) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload3/delete_file.php",
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
function delete_file1(val,area,under,numb) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload3/delete_file1.php",
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
        url: "../actions/upload3/delete_file2.php",
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
        url: "../actions/upload3/delete_file3.php",
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
        url: "../actions/upload3/delete_file4.php",
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
        url: "../actions/upload3/delete_file5.php",
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
        url: "../actions/upload3/delete_file6.php",
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