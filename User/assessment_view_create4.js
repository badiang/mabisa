
function upload_411() {
    $("#file_report_411").trigger("click");
}
function upload_412() {
    $("#file_report_412").trigger("click");
}
function upload_413() {
    $("#file_report_413").trigger("click");
}
function upload_414() {
    $("#file_report_414").trigger("click");
}
function upload_415() {
    $("#file_report_415").trigger("click");
}
function upload_416() {
    $("#file_report_416").trigger("click");
}
function upload_417() {
    $("#file_report_417").trigger("click");
}
function upload_418() {
    $("#file_report_418").trigger("click");
}
function upload_419() {
    $("#file_report_419").trigger("click");
}
function upload_420() {
    $("#file_report_420").trigger("click");
}
function upload_421() {
    $("#file_report_421").trigger("click");
}
function upload_422() {
    $("#file_report_422").trigger("click");
}
function upload_423() {
    $("#file_report_423").trigger("click");
}
function upload_424() {
    $("#file_report_424").trigger("click");
}
function upload_425() {
    $("#file_report_425").trigger("click");
}
function upload_426() {
    $("#file_report_426").trigger("click");
}
function upload_427() {
    $("#file_report_427").trigger("click");
}
function upload_428() {
    $("#file_report_428").trigger("click");
}
function upload_429() {
    $("#file_report_429").trigger("click");
}
function upload_430() {
    $("#file_report_430").trigger("click");
}
function upload_431() {
    $("#file_report_431").trigger("click");
}
function upload_432() {
    $("#file_report_432").trigger("click");
}
function upload_433() {
    $("#file_report_433").trigger("click");
}
function upload_434() {
    $("#file_report_434").trigger("click");
}
function upload_435() {
    $("#file_report_435").trigger("click");
}

function uploadFile411() {
    const fileInput = $('#file_report_411')[0];
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
        url: '../actions/upload4/upload_file411.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile412() {
    const fileInput = $('#file_report_412')[0];
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
        url: '../actions/upload4/upload_file412.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile413() {
    const fileInput = $('#file_report_413')[0];
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
        url: '../actions/upload4/upload_file413.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile414() {
    const fileInput = $('#file_report_414')[0];
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
        url: '../actions/upload4/upload_file414.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile415() {
    const fileInput = $('#file_report_415')[0];
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
        url: '../actions/upload4/upload_file415.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile416() {
    const fileInput = $('#file_report_416')[0];
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
        url: '../actions/upload4/upload_file416.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile417() {
    const fileInput = $('#file_report_417')[0];
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
        url: '../actions/upload4/upload_file417.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile418() {
    const fileInput = $('#file_report_418')[0];
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
        url: '../actions/upload4/upload_file418.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile419() {
    const fileInput = $('#file_report_419')[0];
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
        url: '../actions/upload4/upload_file419.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile420() {
    const fileInput = $('#file_report_420')[0];
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
        url: '../actions/upload4/upload_file420.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile421() {
    const fileInput = $('#file_report_421')[0];
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
        url: '../actions/upload4/upload_file421.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile422() {
    const fileInput = $('#file_report_422')[0];
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
        url: '../actions/upload4/upload_file422.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile423() {
    const fileInput = $('#file_report_423')[0];
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
        url: '../actions/upload4/upload_file423.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile424() {
    const fileInput = $('#file_report_424')[0];
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
        url: '../actions/upload4/upload_file424.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile425() {
    const fileInput = $('#file_report_425')[0];
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
        url: '../actions/upload4/upload_file425.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile426() {
    const fileInput = $('#file_report_426')[0];
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
        url: '../actions/upload4/upload_file426.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile427() {
    const fileInput = $('#file_report_427')[0];
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
        url: '../actions/upload4/upload_file427.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile428() {
    const fileInput = $('#file_report_428')[0];
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
        url: '../actions/upload4/upload_file428.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile429() {
    const fileInput = $('#file_report_429')[0];
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
        url: '../actions/upload4/upload_file429.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile430() {
    const fileInput = $('#file_report_430')[0];
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
        url: '../actions/upload4/upload_file430.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile431() {
    const fileInput = $('#file_report_431')[0];
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
        url: '../actions/upload4/upload_file431.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile432() {
    const fileInput = $('#file_report_432')[0];
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
        url: '../actions/upload4/upload_file432.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile433() {
    const fileInput = $('#file_report_433')[0];
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
        url: '../actions/upload4/upload_file433.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile434() {
    const fileInput = $('#file_report_434')[0];
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
        url: '../actions/upload4/upload_file434.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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
function uploadFile435() {
    const fileInput = $('#file_report_435')[0];
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
        url: '../actions/upload4/upload_file435.php', // Replace 'upload.php' with the path to your PHP file handling the file upload.
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

function delete_file(val) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload4/delete_file.php",
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
function delete_file1(val) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload4/delete_file1.php",
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
function delete_file2(val) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload4/delete_file2.php",
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
function delete_file3(val) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload4/delete_file3.php",
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
function delete_file4(val) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload4/delete_file4.php",
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
function delete_file5(val) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload4/delete_file5.php",
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
function delete_file6(val) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload4/delete_file6.php",
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
function delete_file7(val) {
    // alert(val);
    $.ajax({
        type: "POST",
        url: "../actions/upload4/delete_file7.php",
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