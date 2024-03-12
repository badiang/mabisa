<!-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"> -->
<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: background: rgb(184,210,59);background: linear-gradient(342deg, rgba(184,210,59,1) 0%, rgba(234,34,34,1) 53%, rgba(0,108,255,1) 100%);"> -->

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mt-4" href="index.html">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <!-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> -->
                <img src="../img/logo/logo.png" width="150" height="150">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 mt-4">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../User/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href="assessment.php">
                <i class="fas fa-table"></i>
                <span>Barangay Assessment</span></a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brgy_assessment"
                    aria-expanded="true" aria-controls="brgy_assessment">
                    <i class="fas fa-table"></i>
                    <span>Barangay Assessment</span>
                </a>
                <div id="brgy_assessment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="list_of_barangay_assessment.php">All Assessments</a>
                        <a class="collapse-item" href="assessment.php">My Assessments</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="comment_review.php">
                    <i class="fas fa-file-alt"></i>
                    <span>Comment Review</span></a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="self_assessment.php">
                    <i class="fas fa-file"></i>
                    <span>Self Assessment</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>