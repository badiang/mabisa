<?php 
    $count_noti = 0;
    $sql_noti1 = $dbconn->prepare("SELECT count(*) as count FROM core11 where noti_me=1 ");
    $sql_noti1->execute();
    $row_noti1 = $sql_noti1->fetch(PDO::FETCH_ASSOC);

    $sql_noti2 = $dbconn->prepare("SELECT count(*) as count FROM core12 where noti_me=1 ");
    $sql_noti2->execute();
    $row_noti2 = $sql_noti2->fetch(PDO::FETCH_ASSOC);

    $sql_noti3 = $dbconn->prepare("SELECT count(*) as count FROM core13 where noti_me=1 ");
    $sql_noti3->execute();
    $row_noti3 = $sql_noti3->fetch(PDO::FETCH_ASSOC);

    $sql_noti4 = $dbconn->prepare("SELECT count(*) as count FROM core14 where noti_me=1 ");
    $sql_noti4->execute();
    $row_noti4 = $sql_noti4->fetch(PDO::FETCH_ASSOC);

    $sql_noti5 = $dbconn->prepare("SELECT count(*) as count FROM core15 where noti_me=1 ");
    $sql_noti5->execute();
    $row_noti5 = $sql_noti5->fetch(PDO::FETCH_ASSOC);

    $sql_noti6 = $dbconn->prepare("SELECT count(*) as count FROM core16 where noti_me=1 ");
    $sql_noti6->execute();
    $row_noti6 = $sql_noti6->fetch(PDO::FETCH_ASSOC);

    $sql_noti7 = $dbconn->prepare("SELECT count(*) as count FROM core17 where noti_me=1 ");
    $sql_noti7->execute();
    $row_noti7 = $sql_noti7->fetch(PDO::FETCH_ASSOC);

    $sql_noti21 = $dbconn->prepare("SELECT count(*) as count FROM core21 where noti_me=1 ");
    $sql_noti21->execute();
    $row_noti21 = $sql_noti21->fetch(PDO::FETCH_ASSOC);

    $sql_noti22 = $dbconn->prepare("SELECT count(*) as count FROM core22 where noti_me=1 ");
    $sql_noti22->execute();
    $row_noti22 = $sql_noti22->fetch(PDO::FETCH_ASSOC);

    $sql_noti23 = $dbconn->prepare("SELECT count(*) as count FROM core23 where noti_me=1 ");
    $sql_noti23->execute();
    $row_noti23 = $sql_noti23->fetch(PDO::FETCH_ASSOC);

    $sql_noti31 = $dbconn->prepare("SELECT count(*) as count FROM core31 where noti_me=1 ");
    $sql_noti31->execute();
    $row_noti31 = $sql_noti31->fetch(PDO::FETCH_ASSOC);

    $sql_noti32 = $dbconn->prepare("SELECT count(*) as count FROM core32 where noti_me=1 ");
    $sql_noti32->execute();
    $row_noti32 = $sql_noti32->fetch(PDO::FETCH_ASSOC);

    $sql_noti33 = $dbconn->prepare("SELECT count(*) as count FROM core33 where noti_me=1 ");
    $sql_noti33->execute();
    $row_noti33 = $sql_noti33->fetch(PDO::FETCH_ASSOC);

    $sql_noti34 = $dbconn->prepare("SELECT count(*) as count FROM core34 where noti_me=1 ");
    $sql_noti34->execute();
    $row_noti34 = $sql_noti34->fetch(PDO::FETCH_ASSOC);

    $sql_noti35 = $dbconn->prepare("SELECT count(*) as count FROM core35 where noti_me=1 ");
    $sql_noti35->execute();
    $row_noti35 = $sql_noti35->fetch(PDO::FETCH_ASSOC);

    $sql_noti36 = $dbconn->prepare("SELECT count(*) as count FROM core36 where noti_me=1 ");
    $sql_noti36->execute();
    $row_noti36 = $sql_noti36->fetch(PDO::FETCH_ASSOC);

    $sql_noti41 = $dbconn->prepare("SELECT count(*) as count FROM essen11 where noti_me=1 ");
    $sql_noti41->execute();
    $row_noti41 = $sql_noti41->fetch(PDO::FETCH_ASSOC);

    $sql_noti42 = $dbconn->prepare("SELECT count(*) as count FROM essen12 where noti_me=1 ");
    $sql_noti42->execute();
    $row_noti42 = $sql_noti42->fetch(PDO::FETCH_ASSOC);

    $sql_noti43 = $dbconn->prepare("SELECT count(*) as count FROM essen13 where noti_me=1 ");
    $sql_noti43->execute();
    $row_noti43 = $sql_noti43->fetch(PDO::FETCH_ASSOC);

    $sql_noti44 = $dbconn->prepare("SELECT count(*) as count FROM essen14 where noti_me=1 ");
    $sql_noti44->execute();
    $row_noti44 = $sql_noti44->fetch(PDO::FETCH_ASSOC);

    $sql_noti45 = $dbconn->prepare("SELECT count(*) as count FROM essen15 where noti_me=1 ");
    $sql_noti45->execute();
    $row_noti45 = $sql_noti45->fetch(PDO::FETCH_ASSOC);

    $sql_noti46 = $dbconn->prepare("SELECT count(*) as count FROM essen16 where noti_me=1 ");
    $sql_noti46->execute();
    $row_noti46 = $sql_noti46->fetch(PDO::FETCH_ASSOC);

    $sql_noti47 = $dbconn->prepare("SELECT count(*) as count FROM essen17 where noti_me=1 ");
    $sql_noti47->execute();
    $row_noti47 = $sql_noti47->fetch(PDO::FETCH_ASSOC);

    $sql_noti51 = $dbconn->prepare("SELECT count(*) as count FROM essen21 where noti_me=1 ");
    $sql_noti51->execute();
    $row_noti51 = $sql_noti51->fetch(PDO::FETCH_ASSOC);

    $sql_noti52 = $dbconn->prepare("SELECT count(*) as count FROM essen22 where noti_me=1 ");
    $sql_noti52->execute();
    $row_noti52 = $sql_noti52->fetch(PDO::FETCH_ASSOC);

    $sql_noti53 = $dbconn->prepare("SELECT count(*) as count FROM essen23 where noti_me=1 ");
    $sql_noti53->execute();
    $row_noti53 = $sql_noti53->fetch(PDO::FETCH_ASSOC);

    $sql_noti61 = $dbconn->prepare("SELECT count(*) as count FROM essen31 where noti_me=1 ");
    $sql_noti61->execute();
    $row_noti61 = $sql_noti61->fetch(PDO::FETCH_ASSOC);

    $sql_noti62 = $dbconn->prepare("SELECT count(*) as count FROM essen32 where noti_me=1 ");
    $sql_noti62->execute();
    $row_noti62 = $sql_noti62->fetch(PDO::FETCH_ASSOC);

    $sql_noti63 = $dbconn->prepare("SELECT count(*) as count FROM essen33 where noti_me=1 ");
    $sql_noti63->execute();
    $row_noti63 = $sql_noti63->fetch(PDO::FETCH_ASSOC);

    $count_noti = $row_noti63['count']+$row_noti62['count']+$row_noti61['count']+$row_noti53['count']+$row_noti52['count']+$row_noti51['count']+$row_noti47['count']+$row_noti46['count']+$row_noti45['count']+$row_noti44['count']+$row_noti43['count']+$row_noti42['count']+$row_noti41['count']+$row_noti36['count']+$row_noti35['count']+$row_noti34['count']+$row_noti33['count']+$row_noti32['count']+$row_noti31['count']+$row_noti23['count']+$row_noti22['count']+$row_noti21['count']+$row_noti7['count']+$row_noti6['count']+$row_noti5['count']+$row_noti4['count']+$row_noti3['count']+$row_noti2['count']+$row_noti1['count'];
    
 ?>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow"> -->

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
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core11 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=1">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core12 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=2">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core13 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=3">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core14 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=4">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core15 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=5">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core16 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=6">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core17 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=7">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core21 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=21">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core22 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=22">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core23 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=23">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core31 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=31">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core32 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=32">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core33 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=33">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core34 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=34">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core35 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=35">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM core36 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=36">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM essen11 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=41">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM essen12 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=42">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM essen13 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=43">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM essen14 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=44">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM essen15 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=45">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM essen16 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=46">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM essen17 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=47">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM essen21 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=51">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM essen22 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=52">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM essen23 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=53">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM essen31 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=61">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM essen32 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=62">
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
                                    
                                <?php } ?>
                                <?php 
                                    $sql_noti_show = $dbconn->prepare("SELECT b.keyctr,a.year,c.barangay_name,a.id FROM essen33 as a inner join assessment as b on b.id=a.id inner join barangay as c on b.barangay_code=c.barangay_code where a.noti_me=1 ");
                                    $sql_noti_show->execute();
                                    while($row_noti_show = $sql_noti_show->fetch(PDO::FETCH_ASSOC)){ 
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="view_other_barangay_file.php?tab=<?php echo $row_noti_show['keyctr'] ?>/1&code=<?php echo $row_noti_show['id'] ?>&yr=<?php echo $row_noti_show['year'] ?>&xn=63">
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
                                    
                                <?php } ?>
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
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
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
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#email">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Email
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#username">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Username
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#passwordModal2">
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

<!-- Logout Modal-->
    <div class="modal fade" id="passwordModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
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
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
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
                    <h5 class="modal-title" id="exampleModalLabel">Change Username</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
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