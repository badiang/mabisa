
function upload_211() {
    $("#file_report_211").trigger("click");
}
function upload_212() {
    $("#file_report_212").trigger("click");
}
function upload_213() {
    $("#file_report_213").trigger("click");
}
function upload_214() {
    $("#file_report_214").trigger("click");
}
function upload_215() {
    $("#file_report_215").trigger("click");
}
function upload_216() {
    $("#file_report_216").trigger("click");
}
function upload_217() {
    $("#file_report_217").trigger("click");
}
function upload_218() {
    $("#file_report_218").trigger("click");
}
function upload_219() {
    $("#file_report_219").trigger("click");
}
function upload_220() {
    $("#file_report_220").trigger("click");
}

function uploadFile211() {
    const fileInput = $('#file_report_211')[0];
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
        url: '../actions/upload2/upload_file211.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile212() {
    const fileInput = $('#file_report_212')[0];
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
        url: '../actions/upload2/upload_file212.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile213() {
    const fileInput = $('#file_report_213')[0];
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
        url: '../actions/upload2/upload_file213.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile214() {
    const fileInput = $('#file_report_214')[0];
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
        url: '../actions/upload2/upload_file214.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile215() {
    const fileInput = $('#file_report_215')[0];
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
        url: '../actions/upload2/upload_file215.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile216() {
    const fileInput = $('#file_report_216')[0];
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
        url: '../actions/upload2/upload_file216.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile217() {
    const fileInput = $('#file_report_217')[0];
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
        url: '../actions/upload2/upload_file217.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile218() {
    const fileInput = $('#file_report_218')[0];
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
        url: '../actions/upload2/upload_file218.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile219() {
    const fileInput = $('#file_report_219')[0];
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
        url: '../actions/upload2/upload_file219.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile220() {
    const fileInput = $('#file_report_220')[0];
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
        url: '../actions/upload2/upload_file220.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
        url: "../actions/upload2/delete_file.php",
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
        url: "../actions/upload2/delete_file1.php",
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
        url: "../actions/upload2/delete_file2.php",
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
        url: "../actions/upload2/delete_file3.php",
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