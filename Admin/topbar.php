<?php 

    $sql_prof_pic = $dbconn->prepare("SELECT profile_pic FROM account where id='$id' ");
    $sql_prof_pic->execute();
    $row_prof_pic = $sql_prof_pic->fetch(PDO::FETCH_ASSOC);
    $prof_pic = $row_prof_pic['profile_pic'];

    $count_noti = 0;
    $tables = array(
        "core11", "core12", "core13", "core14", "core15", "core16", "core17",
        "core21", "core22", "core23",
        "core31", "core32", "core33",
        "essen11", "essen12", "essen13", "essen14", "essen15", "essen16", "essen17",
        "essen21", "essen22", "essen23",
        "essen31", "essen32", "essen33"
    );

    foreach ($tables as $table) {
        $sql = $dbconn->prepare("SELECT count(*) as count FROM $table where noti_me=1 ");
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $count_noti += $row['count'];
    }

    
 ?>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow"> -->

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <style type="text/css">
                        @media screen and (max-width: 600px) {
                              .mobile_hide {
                                display: none;
                              }
                            }
                    </style>
                    <h4 class="mobile_hide" style="text-transform: uppercase;"><b>Mabilisang Aksyon Barangay Information System of Aloran</b></h4>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <?php if ($count_noti>0): ?>
                                    <span class="badge badge-danger badge-counter"><?php echo $count_noti ?></span>
                                <?php endif ?>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <?php
                                $core_tables = array(
                                    "core11", "core12", "core13", "core14", "core15", "core16", "core17",
                                    "core21", "core22", "core23",
                                    "core31", "core32", "core33", "core34", "core35", "core36",
                                    "essen11", "essen12", "essen13", "essen14", "essen15", "essen16", "essen17",
                                    "essen21", "essen22", "essen23",
                                    "essen31", "essen32", "essen33"
                                );

                                $sql_base = "SELECT b.keyctr, a.year, c.barangay_name, a.id FROM %s AS a INNER JOIN assessment AS b ON b.id = a.id INNER JOIN barangay AS c ON b.barangay_code = c.barangay_code WHERE a.noti_me = 1 LIMIT 3";

                                $count = 0;

                                foreach ($core_tables as $index => $table) {
                                    $sql = sprintf($sql_base, $table);
                                    
                                    $sql_noti_show = $dbconn->prepare($sql);
                                    $sql_noti_show->execute();

                                    while ($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)) {
                                        $xn = $index + 1;

                                        if ($count < 3) {
                                ?>
                                            <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=<?php echo $xn; ?>">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-warning">
                                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="small text-gray-500"><?php echo $row_noti_show['year'] ?></div>
                                                    <span class="font-weight-bold">New Update from Barangay <?php echo $row_noti_show['barangay_name'] ?></span>
                                                </div>
                                            </a>
                                <?php
                                            $count++;
                                        }
                                    }
                                }
                                ?>
                                <span id="display_noti2"></span>
                                <span id="seeMoreLink2"><button class="dropdown-item text-center small text-gray-500" onclick="seeMoreLink2(event)" style="cursor: pointer;">See More</button></span>
                                <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> -->
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span> -->
                                <span class="mr-2 d-none d-lg-inline small" style="color: black;"><b><?php echo $_SESSION['username'] ?></b></span>
                                <?php 
                                if (!empty($prof_pic)) {
                                    $upload_path = '../actions/profile/'.$prof_pic;
                                    if (file_exists($upload_path)) {
                                        echo '<img id="profilePicture" class="img-profile rounded-circle" src="' . $upload_path . '" alt="Uploaded Image">';
                                    } else {
                                        echo '<img id="profilePicture" class="img-profile rounded-circle" src="../img/undraw_profile.svg">';
                                    }
                                }else{
                                    echo '<img id="profilePicture" class="img-profile rounded-circle" src="../img/undraw_profile.svg">';
                                }
                                    
                                 ?>
                                    
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Profile Picture
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#email">
                                    <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Email
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#username">
                                    <i class="fas fa-address-card fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Username
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#passwordModal2">
                                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Upload Profile Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" action="../actions/upload_profile_pic.php" method="post" enctype="multipart/form-data">
                    <!-- Label for old/new profile picture -->
                    <div class="form-group text-center mb-3">
                        <span id="pictureStatusLabel">Your current profile picture</span>
                    </div>
                    <!-- Profile Picture Preview -->
                    <div class="form-group text-center">
                        <?php 
                            $upload_path = '../actions/profile/'.$prof_pic;
                            if (file_exists($upload_path)) {
                                // Display the uploaded image
                                echo '<img id="profilePreview" class="img-fluid rounded-circle mb-3" src="' . $upload_path . '" alt="Uploaded Image" style="max-width: 150px; max-height: 150px;">';
                            } else {
                                // Display the default image
                                echo '<img id="profilePreview" class="img-fluid rounded-circle mb-3" src="../img/undraw_profile.svg" alt="Profile Preview" style="max-width: 150px; max-height: 150px;">';
                            }
                         ?>
                    </div>
                    <!-- File Input and Upload Button -->
                    <div class="form-row align-items-center">
                        <div class="col">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload" onchange="previewProfilePicture(this);">
                                <label class="custom-file-label" for="fileToUpload">Choose file</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Logout Modal-->
    <div class="modal fade" id="passwordModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Change Password</strong></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">×</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <div id="alert_password2"></div>
                    <div class="form-group">
                        <label for="current_password21">Current Password:</label>
                        <input type="password" class="form-control form-control-user" id="current_password21" name="current_password21" autocomplete="off">
                        <input type="text" class="form-control form-control-user" id="current_password22" name="current_password22" value="<? echo $_SESSION['password'] ?>" hidden>
                    </div>
                    <div class="form-group">
                        <label for="new_password2">New Password:</label>
                        <input type="password" class="form-control form-control-user"
                            id="new_password2" name="new_password2">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password2">Re-entered New Password:</label>
                        <input type="password" class="form-control form-control-user"
                            id="confirm_password2" name="confirm_password2">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <a class="btn btn-primary" onclick="confirm_password22()" >Confirm</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function confirm_password22() {
        var ok = 1;
        var current_password = $('#current_password22').val();
        var current_password2 = $('#current_password22').val();
        var new_password2 = $('#new_password2').val();
        var confirm_password2 = $('#confirm_password2').val();
        // alert(current_password2);
        if (current_password != current_password2) {
            $('#alert_password2').html('<span style="color: red;">Incorrect Current Password.</span>');
            ok = 0;
        }
        if (new_password2 != confirm_password2) {
            $('#alert_password2').html('<span style="color: red;">Passwords do not match.</span>');
            ok = 0;
        }
        if (new_password2.length < 8) {
            $('#alert_password2').html('<span style="color: red;">Password must be at least 8 characters long.</span>');
            ok = 0;
        }

        if (ok == 1) {
            $.ajax({
                type: "POST",
                url: "../User/actions/password_email.php",
                async: false,
                data: {
                    new_password: new_password2,
                    confirm_password: confirm_password2,
                    change: 1
                },
                success: function(result) {
                    $('#alert_password2').html('<span style="color: green;">Password Successfully changed.</span>');
                }
            });
        }
    }
</script>


    <div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Change Email</strong></h5>
                    <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close"> -->
                        <!-- <span aria-hidden="true">×</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <div id="alert_password23"></div>
                    <div class="form-group">
                        <label for="change_email">Email:</label>
                        <input type="email" class="form-control form-control-user"
                            id="change_email" name="change_email" value="<?php echo $_SESSION['email'] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <a class="btn btn-primary" onclick="confirm_email()">Confirm</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function confirm_email() {
            change_email = $('#change_email').val();
            $.ajax({
                type: "POST",
                url: "actions/change_email.php",
                async: false,
                data: {
                    change_email: change_email,
                    change: 1
                },
                success:function(result){
                    $('#alert_password23').html('<span style="color: green;">Email Successfully Updated.</span>');
                }
            });
        }
    </script>

    <div class="modal fade" id="username" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Change Username</strong></h5>
                    <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close"> -->
                        <!-- <span aria-hidden="true">×</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <div id="alert_username"></div>
                    <div class="form-group">
                        <label for="change_username">Username:</label>
                        <input type="text" class="form-control form-control-user"
                            id="change_username" name="change_username" value="<?php echo $_SESSION['username'] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <a class="btn btn-primary" onclick="confirm_username()">Confirm</a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function confirm_username() {
            change_username = $('#change_username').val();

            $.ajax({
                type: "POST",
                url: "actions/change_username.php",
                async: false,
                data: {
                    change_username: change_username,
                    change: 1
                },
                success:function(result){
                    $('#alert_username').html('<span style="color: green;">Username Successfully Updated.</span>');
                }
            });

        }
    </script>
<script>
// Function to preview profile picture and update file name
function previewProfilePicture(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#profilePreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);

        // Update file name label
        var fileName = input.files[0].name;
        $(input).next('.custom-file-label').html(fileName);

        // Update picture status label
        $('#pictureStatusLabel').text('Your new profile picture');
    }
}


</script>

