    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Change</strong> <strong>Password</strong></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">×</span> -->
                    </button>
                </div>
                <div class="modal-body">
                    <div id="alert_password"></div>
                    <div class="form-group">
                        <label for="current_password">Current Password:</label>
                        <input type="password" class="form-control form-control-user" id="current_password" name="current_password" autocomplete="off">
                        <input type="text" class="form-control form-control-user" id="current_password2" name="current_password2" value="<? echo $_SESSION['password'] ?>" hidden>
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password:</label>
                        <input type="password" class="form-control form-control-user"
                            id="new_password" name="new_password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" class="form-control form-control-user"
                            id="confirm_password" name="confirm_password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <a class="btn btn-primary" onclick="confirm_password()">Confirm</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Ready to Leave?</strong></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">×</span> -->
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../actions/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

     <!-- Page datatable -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script>

<script type="text/javascript">

    function seeMoreLink(event) {
        event.stopPropagation();
        $('#display_noti').show();
        $.ajax({
            url: '../actions/notifications.php',
            type: 'GET',
            data: {
                seemore: 1
            },
            success: function(response) {
                $('#display_noti').html(response);
                $('#seeMoreLink').html('<button id="seeMoreLink" class="dropdown-item text-center small text-gray-500" onclick="seeLessLink(event)">See Less</button>');
            },
            error: function(xhr, status, error) {
                console.error('Error loading notifications:', error);
                // Handle error
                loadingMore = false;
            }
        });
    }
    function seeLessLink(event) {
        event.stopPropagation();
        $('#display_noti').hide();
        $('#seeMoreLink').html('<button id="seeMoreLink" class="dropdown-item text-center small text-gray-500" onclick="seeMoreLink(event)">See More</button>');
    }

    function seeMoreLink2(event) {
        event.stopPropagation();
        $('#display_noti2').show();
        $.ajax({
            url: '../actions/notifications2.php',
            type: 'GET',
            data: {
                seemore: 1
            },
            success: function(response) {
                $('#display_noti2').html(response);
                $('#seeMoreLink2').html('<button id="seeMoreLink2" class="dropdown-item text-center small text-gray-500" onclick="seeLessLink2(event)">See Less</button>');
            },
            error: function(xhr, status, error) {
                console.error('Error loading notifications2:', error);
                // Handle error
                loadingMore = false;
            }
        });
    }
    function seeLessLink2(event) {
        event.stopPropagation();
        $('#display_noti2').hide();
        $('#seeMoreLink2').html('<button id="seeMoreLink2" class="dropdown-item text-center small text-gray-500" onclick="seeMoreLink2(event)">See More</button>');
    }


</script>