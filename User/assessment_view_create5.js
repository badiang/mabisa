
function upload_511() {
    $("#file_report_511").trigger("click");
}
function upload_512() {
    $("#file_report_512").trigger("click");
}
function upload_513() {
    $("#file_report_513").trigger("click");
}
function upload_514() {
    $("#file_report_514").trigger("click");
}

function uploadFile511() {
    const fileInput = $('#file_report_511')[0];
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
        url: '../actions/upload5/upload_file511.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile512() {
    const fileInput = $('#file_report_512')[0];
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
        url: '../actions/upload5/upload_file512.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile513() {
    const fileInput = $('#file_report_513')[0];
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
        url: '../actions/upload5/upload_file513.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile514() {
    const fileInput = $('#file_report_514')[0];
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
        url: '../actions/upload5/upload_file514.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
        url: "../actions/upload5/delete_file.php",
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
        url: "../actions/upload5/delete_file1.php",
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
        url: "../actions/upload5/delete_file2.php",
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
        url: "../actions/upload5/delete_file3.php",
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