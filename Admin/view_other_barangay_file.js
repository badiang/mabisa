function restrictInputRange(inputElement) {
    $(inputElement).on('input', function() {
        $(this).val($(this).val().replace(/[^0-9.]/g, ''));

        let value = parseFloat($(this).val());

        if (isNaN(value) || value < 0) {
            $(this).val(0);
        } else if (value > 100) {
            $(this).val(100);
        }
    });
}

$(document).ready(function() {
    restrictInputRange('#point1');
    restrictInputRange('#point2');
    restrictInputRange('#point3');
    restrictInputRange('#point4');
    restrictInputRange('#point5');
    restrictInputRange('#point6');
    restrictInputRange('#point7');
    restrictInputRange('#point8');
    restrictInputRange('#point9');
    restrictInputRange('#point10');
});

function btn_app(a) {
    remarks1 = $('#remarks1').val();
    keyctr1 = $('#keyctr1').val();
    point1 = $('#point1').val();
    // alert(a);
    if (remarks1 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks1: remarks1,
                keyctr1: keyctr1,
                point1: point1,
                btns: a,
                add_remarks1: 1
            },
            success:function(result){
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
    
}


function btn_app12(a) {
    remarks2 = $('#remarks2').val();
    keyctr2 = $('#keyctr2').val();
    point2 = $('#point2').val();
    if (remarks2 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks2: remarks2,
                keyctr2: keyctr2,
                point2: point2,
                btns: a,
                add_remarks2: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app13(a) {
    remarks3 = $('#remarks3').val();
    keyctr3 = $('#keyctr3').val();
    point3 = $('#point3').val();
    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks3: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app14(a) {
    remarks3 = $('#remarks4').val();
    keyctr3 = $('#keyctr4').val();
    point3 = $('#point4').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks4: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app15(a) {
    remarks3 = $('#remarks5').val();
    keyctr3 = $('#keyctr5').val();
    point3 = $('#point5').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks5: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app16(a) {
    remarks3 = $('#remarks6').val();
    keyctr3 = $('#keyctr6').val();
    point3 = $('#point6').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks6: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app17(a) {
    remarks3 = $('#remarks7').val();
    keyctr3 = $('#keyctr7').val();
    point3 = $('#point7').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks7: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app21(a) {
    remarks3 = $('#remarks21').val();
    keyctr3 = $('#keyctr21').val();
    point3 = $('#point21').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks21: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app22(a) {
    remarks3 = $('#remarks22').val();
    keyctr3 = $('#keyctr22').val();
    point3 = $('#point22').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks22: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app23(a) {
    remarks3 = $('#remarks23').val();
    keyctr3 = $('#keyctr23').val();
    point3 = $('#point23').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks23: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app31(a) {
    remarks3 = $('#remarks31').val();
    keyctr3 = $('#keyctr31').val();
    point3 = $('#point31').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks31: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app32(a) {
    remarks3 = $('#remarks32').val();
    keyctr3 = $('#keyctr32').val();
    point3 = $('#point32').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks32: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app33(a) {
    remarks3 = $('#remarks33').val();
    keyctr3 = $('#keyctr33').val();
    point3 = $('#point33').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks33: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app34(a) {
    remarks3 = $('#remarks34').val();
    keyctr3 = $('#keyctr34').val();
    point3 = $('#point34').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks34: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app35(a) {
    remarks3 = $('#remarks35').val();
    keyctr3 = $('#keyctr35').val();
    point3 = $('#point35').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks35: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app36(a) {
    remarks3 = $('#remarks36').val();
    keyctr3 = $('#keyctr36').val();
    point3 = $('#point36').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks36: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app41(a) {
    remarks3 = $('#remarks41').val();
    keyctr3 = $('#keyctr41').val();
    point3 = $('#point41').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks41: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app42(a) {
    remarks3 = $('#remarks42').val();
    keyctr3 = $('#keyctr42').val();
    point3 = $('#point42').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks42: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app43(a) {
    remarks3 = $('#remarks43').val();
    keyctr3 = $('#keyctr43').val();
    point3 = $('#point43').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks43: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app44(a) {
    remarks3 = $('#remarks44').val();
    keyctr3 = $('#keyctr44').val();
    point3 = $('#point44').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks44: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app45(a) {
    remarks3 = $('#remarks45').val();
    keyctr3 = $('#keyctr45').val();
    point3 = $('#point45').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks45: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app46(a) {
    remarks3 = $('#remarks46').val();
    keyctr3 = $('#keyctr46').val();
    point3 = $('#point46').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks46: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app47(a) {
    remarks3 = $('#remarks47').val();
    keyctr3 = $('#keyctr47').val();
    point3 = $('#point47').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks47: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app51(a) {
    remarks3 = $('#remarks51').val();
    keyctr3 = $('#keyctr51').val();
    point3 = $('#point51').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks51: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app52(a) {
    remarks3 = $('#remarks52').val();
    keyctr3 = $('#keyctr52').val();
    point3 = $('#point52').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks52: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app53(a) {
    remarks3 = $('#remarks53').val();
    keyctr3 = $('#keyctr53').val();
    point3 = $('#point53').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks53: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app61(a) {
    remarks3 = $('#remarks61').val();
    keyctr3 = $('#keyctr61').val();
    point3 = $('#point61').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks61: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app62(a) {
    remarks3 = $('#remarks62').val();
    keyctr3 = $('#keyctr62').val();
    point3 = $('#point62').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks62: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}

function btn_app63(a) {
    remarks3 = $('#remarks63').val();
    keyctr3 = $('#keyctr63').val();
    point3 = $('#point63').val();

    if (remarks3 != '') {
        $.ajax({
            type: "POST",
            url: "actions/addPoints.php",
            async: false,
            data: {
                remarks3: remarks3,
                keyctr3: keyctr3,
                point3: point3,
                btns: a,
                add_remarks63: 1
            },
            success:function(result){
                // alert(result);
                if(a == 1){
                   alert('Successfully Approved'); 
                }else{
                    alert('Successfully Disapproved');
                }
            }
        });
    }else{
        alert('Remarks is needed before clicking Approved or Disapproved');
    }
}


function btn_submit_comment(area,under_area,comment_numb,comment,year,user_id){
    if (comment == '') {
        $('#alert'+area+under_area+comment_numb).html('<div class="text-danger">Comment is empty</div>');
    }else{
        $('#alert'+area+under_area+comment_numb).html('<div class="text-danger"></div>');
        // alert(comment_numb);
        $.ajax({
            type: "POST",
            url: "actions/addComments.php",
            async: false,
            data: {
                area: area,
                under_area: under_area,
                comment_numb: comment_numb,
                comment: comment,
                year: year,
                user_id: user_id,
                update: 1
            },
            success:function(result){
                // alert(result);
                if(result == 0){
                   $('#alert'+area+under_area+comment_numb).html('<div class="text-success" id="a'+area+under_area+comment_numb+'">Comment is Successfully added</div>');
                   setTimeout(function() {
                        // window.location.reload();
                        $('#a'+area+under_area+comment_numb).hide();
                    }, 2000);
                }else{
                    $('#alert'+area+under_area+comment_numb).html('<div class="text-warning">System error: Submit comment failed</div>');;
                }
            }
        });
    }
    
}

function btn_submit_approved(area,under_area,approved_numb,approve,year,user_id){
    $.ajax({
        type: "POST",
        url: "actions/approved_disapproved.php",
        async: false,
        data: {
            area: area,
            under_area: under_area,
            approved_numb: approved_numb,
            approve: approve,
            year: year,
            user_id: user_id,
            submit: 1
        },
        success:function(result){
            // alert(result);
            if(result == 1){
               alert('Successfully Approved');
               window.location.reload();
            }else{
                alert('Successfully Disapproved');
               window.location.reload();
            }
        }
    });
    
}