
<?php 

    $sql_prof_pic = $dbconn->prepare("SELECT profile_pic FROM account where id='$id' ");
    $sql_prof_pic->execute();
    $row_prof_pic = $sql_prof_pic->fetch(PDO::FETCH_ASSOC);
    $prof_pic = $row_prof_pic['profile_pic'];


    $sql_noti = $dbconn->prepare("SELECT count(*) as count FROM area_assessment_points where user_id=? and noti_me=1 ");
    $sql_noti->bindParam(1, $id);
    $sql_noti->execute();
    $row_noti = $sql_noti->fetch(PDO::FETCH_ASSOC);
    $count_noti = $row_noti['count'];
    
 ?>

<!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"> -->
                <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

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
                                    $sql_noti_show = $dbconn->prepare("SELECT * FROM area_assessment_points WHERE user_id=? AND noti_me=1 LIMIT 3");
                                    $sql_noti_show->bindParam(1, $id);
                                    $sql_noti_show->execute();
                                    $notificationCount = 0; 
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)) { 
                                        $timestamp = strtotime($row_noti_show['date_']);
                                        $formattedDate = date("F j, Y", $timestamp);
                                        $yr = date("Y",strtotime($row_noti_show['date_']));
                                        if ($row_noti_show['approved'] == 2) {
                                            ?>
                                            <a class="dropdown-item d-flex align-items-center" href="comment_review.php?alert=1&yr=<?php echo $yr ?>">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-warning">
                                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="small text-gray-500"><?php echo $formattedDate ?></div>
                                                    <span class="font-weight-bold"><?php echo $row_noti_show['area_number'].'.'.$row_noti_show['under_area'] ?> has been disapproved by the admin.</span>                                      
                                                </div>
                                            </a>
                                            <?php
                                        } elseif ($row_noti_show['approved'] == 1) {
                                            ?>
                                            <a class="dropdown-item d-flex align-items-center" href="comment_review.php?alert=1&yr=<?php echo $yr ?>">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-success">
                                                        <i class="fas fa-check text-white"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="small text-gray-500"><?php echo $formattedDate ?></div>
                                                    <span class="font-weight-bold"><?php echo $row_noti_show['area_number'].'.'.$row_noti_show['under_area'] ?> has been approved by the admin.</span> 
                                                </div>
                                            </a>
                                            <?php
                                        }
                                        $notificationCount++;
                                    }

                                ?>
                                <span id="display_noti"></span>
                                <span id="seeMoreLink"><button class="dropdown-item text-center small text-gray-500" onclick="seeMoreLink(event)" style="cursor: pointer;">See More</button></span>
                                <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> -->
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span> -->
                                <span class="mr-2 d-none d-lg-inline text-white small"><?php echo $_SESSION['username'] ?></span>
                                <?php 
                                if (!empty($prof_pic)) {
                                    $upload_path = '../actions/profile/'.$prof_pic;
                                    if (file_exists($upload_path)) {
                                        // Display the uploaded image
                                        echo '<img id="profilePicture" class="img-profile rounded-circle" src="' . $upload_path . '" alt="Uploaded Image">';
                                    } else {
                                        // Display the default image
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
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Profile Picture
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#passwordModal">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
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
                        if (!empty($prof_pic)) {
                            $upload_path = '../actions/profile/'.$prof_pic;
                            if (file_exists($upload_path)) {
                                // Display the uploaded image
                                echo '<img id="profilePreview" class="img-fluid rounded-circle mb-3" src="' . $upload_path . '" alt="Uploaded Image" style="max-width: 150px; max-height: 150px;">';
                            } else {
                                // Display the default image
                                echo '<img id="profilePreview" class="img-fluid rounded-circle mb-3" src="../img/undraw_profile.svg" alt="Profile Preview" style="max-width: 150px; max-height: 150px;">';
                            }
                        }else{
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